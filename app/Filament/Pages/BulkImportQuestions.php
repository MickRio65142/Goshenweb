<?php

namespace App\Filament\Pages;

use App\Models\Course;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\User;
use App\Services\ExamImportService;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class BulkImportQuestions extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    protected static ?string $navigationLabel = 'Bulk Import';

    protected static ?string $navigationGroup = 'Academics';

    protected static ?int $navigationSort = 7;

    protected string $view = 'filament.admin.pages.bulk-import-questions';

    public ?array $data = [];

    public array $parsedQuestions = [];

    public array $summary = [];

    public $exam = null;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('course_id')
                    ->options(fn () => Course::pluck('title', 'id'))
                    ->searchable()
                    ->required()
                    ->label('Course')
                    ->reactive()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('title', optional(Course::find($state))->title . ' Exam')),
                TextInput::make('title')
                    ->required()
                    ->label('Exam Title'),
                TextInput::make('duration_minutes')
                    ->numeric()
                    ->default(60)
                    ->minValue(1)
                    ->required()
                    ->label('Duration (minutes)'),
                TextInput::make('pass_score')
                    ->numeric()
                    ->default(70)
                    ->minValue(0)
                    ->maxValue(100)
                    ->required()
                    ->suffix('%'),
                TextInput::make('max_attempts')
                    ->numeric()
                    ->default(2)
                    ->minValue(1)
                    ->required(),
                Toggle::make('shuffle_questions')
                    ->default(true)
                    ->label('Shuffle Questions'),
                Toggle::make('is_active')
                    ->default(false)
                    ->label('Active (visible to students)'),
                FileUpload::make('file')
                    ->label('Upload File (Excel, PDF, DOCX, CSV, TXT)')
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                        'application/vnd.ms-excel',
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'text/csv',
                        'text/plain',
                        'application/csv',
                    ])
                    ->maxSize(10240)
                    ->required()
                    ->disk('local')
                    ->directory('tmp-imports')
                    ->columnSpanFull(),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function parse(): void
    {
        $data = $this->form->getState();

        $file = $data['file'] ?? null;
        if (is_array($file)) {
            $file = reset($file);
        }

        if (!$file) {
            Notification::make()->title('Please upload a file first.')->danger()->send();
            return;
        }

        $filePath = Storage::disk('local')->path($file);

        if (!file_exists($filePath)) {
            Notification::make()->title('File not found. Please upload again.')->danger()->send();
            return;
        }

        try {
            $service = app(ExamImportService::class);
            $uploadedFile = new UploadedFile($filePath, basename($filePath));

            $this->parsedQuestions = $service->parseFromFile($uploadedFile);

            if (empty($this->parsedQuestions)) {
                Notification::make()->title('No questions could be parsed from the file. Check the file format.')->danger()->send();
                return;
            }

            $mc = count(array_filter($this->parsedQuestions, fn($q) => $q['type'] === 'multiple_choice'));
            $tf = count(array_filter($this->parsedQuestions, fn($q) => $q['type'] === 'true_false'));
            $sa = count(array_filter($this->parsedQuestions, fn($q) => $q['type'] === 'short_answer'));
            $sc = count(array_filter($this->parsedQuestions, fn($q) => $q['type'] === 'scenario'));

            $this->summary = [
                'total' => count($this->parsedQuestions),
                'multiple_choice' => $mc,
                'true_false' => $tf,
                'short_answer' => $sa,
                'scenario' => $sc,
            ];

            Storage::disk('local')->delete($file);

            Notification::make()
                ->title(count($this->parsedQuestions) . ' questions parsed successfully!')
                ->success()
                ->send();
        } catch (\Exception $e) {
            if (isset($file)) {
                Storage::disk('local')->delete($file);
            }
            Notification::make()->title('Error parsing file: ' . $e->getMessage())->danger()->send();
        }
    }

    public function import(): void
    {
        if (empty($this->parsedQuestions)) {
            Notification::make()->title('No parsed questions to import. Parse a file first.')->danger()->send();
            return;
        }

        $data = $this->form->getState();

        try {
            $exam = Exam::create([
                'title' => $data['title'],
                'course_id' => $data['course_id'],
                'duration_minutes' => $data['duration_minutes'] ?? 60,
                'pass_score' => $data['pass_score'] ?? 70,
                'max_attempts' => $data['max_attempts'] ?? 2,
                'shuffle_questions' => $data['shuffle_questions'] ?? true,
                'is_active' => $data['is_active'] ?? false,
            ]);

            $sortOrder = 0;
            $mcQuestions = 0;
            $tfQuestions = 0;

            foreach ($this->parsedQuestions as $q) {
                if ($q['type'] === 'multiple_choice') {
                    ExamQuestion::create([
                        'exam_id' => $exam->id,
                        'question_text' => $q['question'],
                        'option_a' => $q['options']['a'] ?? '',
                        'option_b' => $q['options']['b'] ?? '',
                        'option_c' => $q['options']['c'] ?? '',
                        'option_d' => $q['options']['d'] ?? '',
                        'correct_option' => $q['correctAnswer'],
                        'sort_order' => $sortOrder++,
                    ]);
                    $mcQuestions++;
                } elseif ($q['type'] === 'true_false') {
                    ExamQuestion::create([
                        'exam_id' => $exam->id,
                        'question_text' => $q['question'],
                        'option_a' => 'True',
                        'option_b' => 'False',
                        'option_c' => '',
                        'option_d' => '',
                        'correct_option' => strtolower($q['correctAnswer'] === 'True' ? 'a' : 'b'),
                        'sort_order' => $sortOrder++,
                    ]);
                    $tfQuestions++;
                } elseif ($q['type'] === 'short_answer' || $q['type'] === 'scenario') {
                    $exam->update(['reference_material' => array_merge(
                        $exam->reference_material ?? [],
                        [['question' => $q['question'], 'answers' => $q['answers'] ?? []]]
                    )]);
                }
            }

            $courseTitle = optional($exam->course)->title ?? 'Course';
            $students = User::whereHas('enrolledCourses', fn($q) => $q->where('course_id', $exam->course_id))->get();
            if ($students->isNotEmpty()) {
                \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\ExamCreated($exam));
            }

            $this->parsedQuestions = [];
            $this->summary = [];
            $this->exam = $exam;
            $this->form->fill();

            Notification::make()
                ->title("Exam '{$exam->title}' created with {$mcQuestions} MC and {$tfQuestions} T/F questions!")
                ->success()
                ->send();
        } catch (\Exception $e) {
            Notification::make()->title('Import failed: ' . $e->getMessage())->danger()->send();
        }
    }

    public function getParsedQuestionsCount(): int
    {
        return count($this->parsedQuestions);
    }

    public function hasParsedQuestions(): bool
    {
        return !empty($this->parsedQuestions);
    }
}
