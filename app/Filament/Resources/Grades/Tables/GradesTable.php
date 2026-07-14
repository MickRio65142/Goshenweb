<?php

namespace App\Filament\Resources\Grades\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class GradesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Student'),
                TextColumn::make('course.title')
                    ->searchable()
                    ->label('Course'),
                TextColumn::make('ca_mark')
                    ->label('CA')
                    ->sortable(),
                TextColumn::make('exam_mark')
                    ->label('Exam')
                    ->sortable(),
                TextColumn::make('total_mark')
                    ->label('Total')
                    ->sortable(),
                TextColumn::make('grade_letter')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'A', 'B+' => 'success',
                        'B', 'C+' => 'warning',
                        'C', 'D' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
