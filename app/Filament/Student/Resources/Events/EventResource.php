<?php

namespace App\Filament\Student\Resources\Events;

use App\Filament\Student\Resources\Events\Pages;
use App\Models\Event;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?int $navigationSort = 3;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-list-bullet';
    protected static ?string $navigationLabel = 'Event Log';
    protected static ?string $modelLabel = 'Event';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Academics';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('event_date');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->weight('semibold')
                    ->searchable(),
                TextColumn::make('event_date')
                    ->label('Date')
                    ->dateTime('M d, Y h:i A')
                    ->description(fn ($record) => $record->event_date->diffForHumans()),
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
            ])
            ->defaultSort('event_date', 'asc')
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEvents::route('/'),
        ];
    }
}
