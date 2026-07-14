<?php

namespace App\Filament\Student\Resources\Exams;

use App\Filament\Student\Resources\Exams\Pages;
use App\Models\Exam;
use App\Models\Enrollment;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use UnitEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static ?int $navigationSort = 3;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-pencil-square';
    protected static ?string $navigationLabel = 'My Exams';
    protected static ?string $modelLabel = 'Exam';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Academics';
    }

    public static function getEloquentQuery(): Builder
    {
        $userId = Auth::id();
        $enrolledCourseIds = Enrollment::where('user_id', $userId)->pluck('course_id');

        return parent::getEloquentQuery()
            ->whereIn('course_id', $enrolledCourseIds)
            ->where('is_active', true)
            ->withCount('questions');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Exam Title')
                    ->weight('semibold')
                    ->searchable(),
                TextColumn::make('course.title')
                    ->label('Course')
                    ->searchable(),
                TextColumn::make('questions_count')
                    ->label('Questions')
                    ->numeric(),
                TextColumn::make('duration_minutes')
                    ->label('Duration')
                    ->suffix(' min'),
                IconColumn::make('is_active')
                    ->label('Available')
                    ->boolean(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\Action::make('start_exam')
                    ->label('Start Exam')
                    ->icon('heroicon-o-play')
                    ->color('success')
                    ->url(fn (Exam $record): string => url("/student/exams/{$record->id}/start"))
                    ->openUrlInNewTab(false),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageExams::route('/'),
        ];
    }
}
