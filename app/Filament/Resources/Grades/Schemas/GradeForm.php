<?php

namespace App\Filament\Resources\Grades\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GradeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable()
                    ->label('Student'),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->required()
                    ->searchable()
                    ->label('Course'),
                TextInput::make('ca_mark')
                    ->numeric()
                    ->required()
                    ->label('CA Mark'),
                TextInput::make('exam_mark')
                    ->numeric()
                    ->required()
                    ->label('Exam Mark'),
                TextInput::make('total_mark')
                    ->numeric()
                    ->required()
                    ->label('Total Mark'),
                Select::make('grade_letter')
                    ->options([
                        'A' => 'A (80-100)',
                        'B+' => 'B+ (75-79)',
                        'B' => 'B (70-74)',
                        'C+' => 'C+ (65-69)',
                        'C' => 'C (60-64)',
                        'D' => 'D (50-59)',
                        'F' => 'F (Below 50)',
                    ])
                    ->required(),
            ]);
    }
}
