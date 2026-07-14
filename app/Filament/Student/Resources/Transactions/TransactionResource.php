<?php

namespace App\Filament\Student\Resources\Transactions;

use App\Filament\Student\Resources\Transactions\Pages;
use App\Models\Transaction;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?int $navigationSort = 1;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Transactions';
    protected static ?string $modelLabel = 'Transaction';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Finance';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id())->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')
                    ->label('Reference')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('type')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'enrollment_fee' => 'Enrollment Fee',
                        'registration_fee' => 'Registration Fee',
                        'refund' => 'Refund',
                        default => ucfirst(str_replace('_', ' ', $state)),
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'enrollment_fee', 'registration_fee' => 'info',
                        'refund' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('amount')
                    ->money('XAF')
                    ->weight('bold'),
                TextColumn::make('payment_method')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'MTN_MoMo' => 'MTN MoMo',
                        'Orange_Money' => 'Orange Money',
                        'Bank_Transfer' => 'Bank Transfer',
                        'Credit_Debit_Card' => 'Credit/Debit Card',
                        default => str_replace('_', ' ', $state),
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTime('M d, Y h:i A'),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTransactions::route('/'),
        ];
    }
}
