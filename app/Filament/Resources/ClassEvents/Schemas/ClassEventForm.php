<?php

namespace App\Filament\Resources\ClassEvents\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Schema;

class ClassEventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->required()
                    ->searchable(),
                TextInput::make('platform')
                    ->required()
                    ->placeholder('e.g., Zoom, Google Meet, WhatsApp'),
                DateTimePicker::make('scheduled_at')
                    ->required()
                    ->label('Start Time'),
                DateTimePicker::make('end_time')
                    ->label('End Time'),
                TextInput::make('join_url')
                    ->url()
                    ->required()
                    ->placeholder('e.g., Zoom link, Meet link, WhatsApp invite URL')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                        'upcoming' => 'Upcoming',
                        'live' => 'Live',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('upcoming'),
                TextInput::make('classroom_details')
                    ->placeholder('Additional notes or instructions')
                    ->columnSpanFull(),
            ]);
    }
}
