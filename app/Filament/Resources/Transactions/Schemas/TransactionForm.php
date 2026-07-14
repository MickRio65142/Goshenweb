<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('reference')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required()
                    ->label('User'),
                TextInput::make('amount')
                    ->numeric()
                    ->required()
                    ->prefix('CFA'),
                Select::make('type')
                    ->options([
                        'registration_fee' => 'Registration Fee',
                        'enrollment_fee' => 'Enrollment Fee',
                        'refund' => 'Refund',
                    ])
                    ->required(),
                Select::make('payment_method')
                    ->options([
                        'MTN_MoMo' => 'MTN MoMo',
                        'Orange_Money' => 'Orange Money',
                        'Bank_Transfer' => 'Bank Transfer',
                        'Credit_Debit_Card' => 'Credit/Debit Card',
                    ])
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
