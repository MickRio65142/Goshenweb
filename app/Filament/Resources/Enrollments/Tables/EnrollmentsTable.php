<?php

namespace App\Filament\Resources\Enrollments\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class EnrollmentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Student')
                    ->searchable(),
                TextColumn::make('course.title')
                    ->label('Course')
                    ->searchable(),
                TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'partial' => 'warning',
                        'pending' => 'gray',
                        'overdue' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('outstanding_balance')
                    ->money('XAF')
                    ->label('O/S Balance'),
                TextColumn::make('progress_percentage')
                    ->numeric()
                    ->suffix('%')
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state >= 100 => 'success',
                        $state > 0 => 'warning',
                        default => 'danger',
                    }),
            ])
            ->filters([])
            ->actions([
                Action::make('suspend')
                    ->label('Suspend')
                    ->icon('fas-ban')
                    ->color('danger')
                    ->action(function ($record) {
                        $record->update(['status' => 'suspended']);
                        if ($record->user) {
                            $record->user->notify(new \App\Notifications\EnrollmentConfirmed($record));
                        }
                    })
                    ->visible(fn ($record) => $record->status !== 'suspended')
                    ->requiresConfirmation(),
                Action::make('reinstate')
                    ->label('Reinstate')
                    ->icon('fas-check')
                    ->color('success')
                    ->action(function ($record) {
                        $record->update(['status' => 'active']);
                        if ($record->user) {
                            $record->user->notify(new \App\Notifications\EnrollmentConfirmed($record));
                        }
                    })
                    ->visible(fn ($record) => $record->status === 'suspended')
                    ->requiresConfirmation(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}