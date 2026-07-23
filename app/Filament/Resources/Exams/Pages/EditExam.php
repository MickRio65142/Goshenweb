<?php

namespace App\Filament\Resources\Exams\Pages;

use App\Filament\Resources\Exams\ExamResource;
use App\Models\ExamQuestion;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExam extends EditRecord
{
    protected static string $resource = ExamResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (isset($data['reference_material']) && is_array($data['reference_material'])) {
            $lines = [];
            foreach ($data['reference_material'] as $item) {
                $lines[] = ($item['question'] ?? '') . "\n> " . implode("\n> ", $item['answers'] ?? []);
            }
            $data['reference_material'] = implode("\n\n", $lines);
        }
        return $data;
    }

    protected function afterSave(): void
    {
        $this->record->refresh();
        $formData = $this->form->getState();

        $bulkImport = $formData['bulk_import'] ?? '';
        $replaceQuestions = $formData['replace_questions'] ?? false;
        if (!empty(trim($bulkImport)) && $replaceQuestions) {
            $this->record->questions()->delete();
            $this->processBulkImport($this->record, $bulkImport);
        } elseif (!empty(trim($bulkImport)) && !$replaceQuestions) {
            $this->processBulkImport($this->record, $bulkImport);
        }

        $this->processReferenceMaterial($this->record, $formData['reference_material'] ?? '');

        if ($this->record->course_id) {
            $students = \App\Models\User::whereHas('enrolledCourses', fn($q) => $q->where('course_id', $this->record->course_id))->get();
            \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\ExamCreated($this->record, 'updated'));
        }
    }

    private function processBulkImport($exam, string $text): void
    {
        if (empty(trim($text))) return;

        $blocks = preg_split('/\n\s*\n/', trim($text));
        $sortOrder = 0;

        foreach ($blocks as $block) {
            $lines = explode("\n", trim($block));
            $questionText = '';
            $options = ['a' => '', 'b' => '', 'c' => '', 'd' => ''];
            $correctOption = null;

            foreach ($lines as $line) {
                $line = trim($line);
                if (preg_match('/^\d+[\.\)]\s*(.+)/', $line, $m)) {
                    $questionText = $m[1];
                } elseif (preg_match('/^[Aa][\.\)]\s*(.+)/', $line, $m)) {
                    $options['a'] = $m[1];
                } elseif (preg_match('/^[Bb][\.\)]\s*(.+)/', $line, $m)) {
                    $options['b'] = $m[1];
                } elseif (preg_match('/^[Cc][\.\)]\s*(.+)/', $line, $m)) {
                    $options['c'] = $m[1];
                } elseif (preg_match('/^[Dd][\.\)]\s*(.+)/', $line, $m)) {
                    $options['d'] = $m[1];
                } elseif (preg_match('/^Answer:\s*([a-dA-D])/i', $line, $m)) {
                    $correctOption = strtolower($m[1]);
                }
            }

            if (!empty($questionText) && $correctOption) {
                ExamQuestion::create([
                    'exam_id' => $exam->id,
                    'question_text' => $questionText,
                    'option_a' => $options['a'],
                    'option_b' => $options['b'],
                    'option_c' => $options['c'],
                    'option_d' => $options['d'],
                    'correct_option' => $correctOption,
                    'sort_order' => $sortOrder++,
                ]);
            }
        }
    }

    private function processReferenceMaterial($exam, string $text): void
    {
        if (empty(trim($text))) {
            $exam->update(['reference_material' => null]);
            return;
        }

        $blocks = preg_split('/\n\s*\n/', trim($text));
        $items = [];

        foreach ($blocks as $block) {
            $lines = explode("\n", trim($block));
            $question = '';
            $answers = [];

            foreach ($lines as $line) {
                $line = trim($line);
                if (preg_match('/^\d+[\.\)]\s*(.+)/', $line, $m)) {
                    $question = $m[1];
                } elseif (str_starts_with($line, '>')) {
                    $answers[] = trim(substr($line, 1));
                } elseif (!empty($line) && !preg_match('/^(Section|Answer|===)/i', $line)) {
                    $answers[] = $line;
                }
            }

            if (!empty($question)) {
                $items[] = [
                    'question' => $question,
                    'answers' => $answers,
                ];
            }
        }

        $exam->update(['reference_material' => !empty($items) ? $items : null]);
    }
}
