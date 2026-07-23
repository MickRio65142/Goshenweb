<?php

namespace App\Filament\Resources\CertificateTemplates\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificateTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('background_file')
                    ->label('Background Image')
                    ->image()
                    ->required()
                    ->directory('certificate-templates')
                    ->visibility('public'),
                Select::make('orientation')
                    ->options([
                        'landscape' => 'Landscape',
                        'portrait' => 'Portrait',
                    ])
                    ->default('landscape')
                    ->required(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->default('active')
                    ->required(),
            ]);
    }
}
