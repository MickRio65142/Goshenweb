<?php

namespace App\Filament\Resources\ExamResults\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class ExamResultsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('exam.title')
                    ->label('Exam')
                    ->searchable(),
                TextColumn::make('attempt_number')
                    ->label('Attempt')
                    ->numeric(),
                TextColumn::make('score')
                    ->label('Score')
                    ->suffix('%')
                    ->badge()
                    ->color(fn (float $state): string => $state >= 70 ? 'success' : 'danger'),
                TextColumn::make('correct_answers')
                    ->label('Correct')
                    ->formatStateUsing(fn ($record) => "{$record->correct_answers}/{$record->total_questions}"),
                TextColumn::make('started_at')
                    ->label('Started')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('completed_at')
                    ->label('Completed')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('passed')
                    ->boolean()
                    ->label('Passed'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }
}
