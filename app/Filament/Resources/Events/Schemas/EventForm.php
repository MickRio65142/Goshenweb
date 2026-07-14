<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Event title'),
                Select::make('event_type')
                    ->options([
                        'academic' => 'Academic',
                        'exam' => 'Exam',
                        'holiday' => 'Holiday',
                        'workshop' => 'Workshop',
                        'orientation' => 'Orientation',
                        'graduation' => 'Graduation',
                        'other' => 'Other',
                    ])
                    ->required(),
                DateTimePicker::make('event_date')
                    ->required()
                    ->label('Event Date & Time'),
                TextInput::make('location')
                    ->placeholder('Venue or online platform'),
                RichEditor::make('description')
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->label('Calendar Color'),
            ]);
    }
}
