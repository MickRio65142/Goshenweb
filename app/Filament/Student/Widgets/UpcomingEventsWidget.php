<?php

namespace App\Filament\Student\Widgets;

use App\Models\Event;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class UpcomingEventsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::where('event_date', '>=', now())
                    ->orderBy('event_date')
                    ->limit(5)
            )
            ->heading('Upcoming Events')
            ->columns([
                TextColumn::make('title')
                    ->weight('semibold'),
                TextColumn::make('event_date')
                    ->label('Date')
                    ->dateTime('M d, Y h:i A'),
                TextColumn::make('event_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'academic' => 'info',
                        'social' => 'success',
                        'exam' => 'danger',
                        'holiday' => 'warning',
                        'deadline' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('location')
                    ->placeholder('N/A'),
            ]);
    }
}
