<?php

namespace App\Filament\Student\Resources\LiveClasses;

use App\Filament\Student\Resources\LiveClasses\Pages;
use App\Models\LiveClass;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class LiveClassResource extends Resource
{
    protected static ?string $model = LiveClass::class;

    protected static ?int $navigationSort = 1;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-video-camera';
    protected static ?string $navigationLabel = 'Live Classes';
    protected static ?string $modelLabel = 'Live Class';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Live Learning';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('course.enrollments', fn ($q) => $q->where('user_id', Auth::id()))
            ->orderBy('scheduled_at');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.name')
                    ->label('Course')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('platform')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Zoom' => 'info',
                        'Google Meet' => 'success',
                        'WhatsApp' => 'warning',
                        'On-Campus' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('scheduled_at')
                    ->label('Scheduled')
                    ->dateTime('M d, Y h:i A')
                    ->since()
                    ->description(fn ($record) => $record->scheduled_at->format('M d, Y h:i A')),
            ])
            ->defaultSort('scheduled_at', 'asc')
            ->filters([])
            ->actions([
                Action::make('join')
                    ->label('Join')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('success')
                    ->url(fn (LiveClass $record): ?string => $record->join_url)
                    ->openUrlInNewTab()
                    ->visible(fn (LiveClass $record): bool => !is_null($record->join_url)),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageLiveClasses::route('/'),
        ];
    }
}
