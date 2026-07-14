<?php

namespace App\Filament\Resources\ClassEvents\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ClassEventsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.title')
                    ->searchable()
                    ->label('Course'),
                TextColumn::make('platform')
                    ->searchable()
                    ->badge(),
                TextColumn::make('scheduled_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Start Time'),
                TextColumn::make('end_time')
                    ->dateTime()
                    ->sortable()
                    ->label('End Time'),
                TextColumn::make('join_url')
                    ->label('Join Link')
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab()
                    ->color('primary')
                    ->icon('heroicon-o-link')
                    ->badge(),
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
