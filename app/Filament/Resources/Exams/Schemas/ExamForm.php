<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->searchable()
                    ->required()
                    ->label('Course'),
                TextInput::make('duration_minutes')
                    ->numeric()
                    ->default(30)
                    ->minValue(1)
                    ->required()
                    ->label('Total Duration (minutes)')
                    ->helperText('Overall exam time limit'),
                TextInput::make('time_per_question_seconds')
                    ->numeric()
                    ->nullable()
                    ->minValue(5)
                    ->maxValue(600)
                    ->label('Time Per Question (seconds)')
                    ->helperText('Leave empty for no per-question limit. When set, questions appear one at a time.'),
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
                    ->default(true)
                    ->label('Active'),
                Textarea::make('bulk_import')
                    ->label('Bulk Import Questions')
                    ->helperText('Paste questions in this format (one question per block):
1. Question text?
A) Option A
B) Option B
C) Option C
D) Option D
Answer: C

For True/False:
21. Statement?
A) True
B) False
Answer: A

Reference material (short answer / scenario):
=== Reference ===
31. Question text?
> Answer text')
                    ->rows(10)
                    ->columnSpanFull(),
                Toggle::make('replace_questions')
                    ->label('Replace existing questions')
                    ->helperText('Check this to delete all existing questions and replace with bulk import above')
                    ->default(false)
                    ->columnSpanFull(),
                Textarea::make('reference_material')
                    ->label('Reference Material (Short Answer / Scenario)')
                    ->helperText('Paste reference questions and answers shown after exam submission.')
                    ->rows(6)
                    ->columnSpanFull(),
                Repeater::make('questions')
                    ->relationship('questions')
                    ->schema([
                        TextInput::make('question_text')
                            ->required()
                            ->label('Question')
                            ->columnSpanFull(),
                        TextInput::make('option_a')
                            ->required()
                            ->label('Option A'),
                        TextInput::make('option_b')
                            ->required()
                            ->label('Option B'),
                        TextInput::make('option_c')
                            ->required()
                            ->label('Option C'),
                        TextInput::make('option_d')
                            ->required()
                            ->label('Option D'),
                        Select::make('correct_option')
                            ->options([
                                'a' => 'A',
                                'b' => 'B',
                                'c' => 'C',
                                'd' => 'D',
                            ])
                            ->required()
                            ->label('Correct Answer'),
                        TextInput::make('points')
                            ->numeric()
                            ->default(1)
                            ->minValue(1),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2)
                    ->defaultItems(5)
                    ->reorderable()
                    ->addable()
                    ->deletable()
                    ->label('Exam Questions')
                    ->columnSpanFull(),
            ]);
    }
}
