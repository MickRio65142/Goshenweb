<?php

namespace App\Filament\Resources\Enrollments\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name', modifyQueryUsing: fn ($query) => $query->where('role', 'student'))
                    ->searchable()
                    ->required()
                    ->label('Student'),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->searchable()
                    ->required()
                    ->label('Course'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'active' => 'Active',
                        'suspended' => 'Suspended',
                    ])
                    ->default('pending')
                    ->label('Status'),
                Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'partial' => 'Partial',
                        'completed' => 'Completed',
                        'overdue' => 'Overdue',
                    ])
                    ->default('pending')
                    ->label('Payment Status'),
                TextInput::make('outstanding_balance')
                    ->numeric()
                    ->default(0)
                    ->prefix('CFA')
                    ->label('Outstanding Balance'),
                DateTimePicker::make('last_payment_at')
                    ->label('Last Payment'),
                TextInput::make('progress_percentage')
                    ->numeric()
                    ->default(0)
                    ->minValue(0)
                    ->maxValue(100)
                    ->required(),
            ]);
    }
}