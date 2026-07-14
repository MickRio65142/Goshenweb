<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\Action;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('user.name')
                    ->label('User')
                    ->searchable(),
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'registration_fee' => 'info',
                        'enrollment_fee' => 'warning',
                        'refund' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('amount')
                    ->money('XAF')
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'completed' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Action::make('confirm')
                    ->label('Confirm')
                    ->icon('fas-check')
                    ->color('success')
                    ->action(fn ($record) => $record->update(['status' => 'completed']))
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->requiresConfirmation(),
                Action::make('reject')
                    ->label('Reject')
                    ->icon('fas-times')
                    ->color('danger')
                    ->action(fn ($record) => $record->update(['status' => 'failed']))
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->requiresConfirmation(),
                EditAction::make(),
            ])
            ->bulkActions([]);
    }
}
