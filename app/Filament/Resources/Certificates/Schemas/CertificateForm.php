<?php

namespace App\Filament\Resources\Certificates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class CertificateForm
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
                TextInput::make('certificate_number')
                    ->required()
                    ->placeholder('e.g., GOS-2026-0001'),
                DatePicker::make('issue_date')
                    ->required(),
                Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'issued' => 'Issued',
                        'revoked' => 'Revoked',
                    ])
                    ->default('available')
                    ->required(),
                TextInput::make('file_path')
                    ->label('Certificate File Path')
                    ->placeholder('Path to certificate PDF file'),
            ]);
    }
}
