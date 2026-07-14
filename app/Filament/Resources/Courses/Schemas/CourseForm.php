<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->columnSpanFull(),
                TextInput::make('credit_hours')
                    ->numeric()
                    ->default(3)
                    ->required(),
            ]);
    }
}