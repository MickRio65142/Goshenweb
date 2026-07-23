<?php

namespace App\Filament\Student\Resources\Notifications;

use App\Filament\Student\Resources\Notifications\Pages;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationResource extends Resource
{
    protected static ?string $model = DatabaseNotification::class;

    protected static ?int $navigationSort = 2;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationLabel = 'Notifications';
    protected static ?string $modelLabel = 'Notification';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Communication';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('notifiable_type', 'App\Models\User')
            ->where('notifiable_id', Auth::id())
            ->latest();
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('data.title')
                    ->label('Title')
                    ->searchable()
                    ->weight('semibold')
                    ->description(fn ($record) => $record->data['body'] ?? ''),
                TextColumn::make('created_at')
                    ->label('Received')
                    ->since()
                    ->description(fn ($record) => $record->created_at->format('M d, Y h:i A')),
                TextColumn::make('read_at')
                    ->label('Status')
                    ->badge()
                    ->color(fn ($state): string => $state ? 'gray' : 'warning')
                    ->formatStateUsing(fn ($state): string => $state ? 'Read' : 'Unread'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Action::make('mark_read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn (DatabaseNotification $record) => $record->markAsRead())
                    ->visible(fn (DatabaseNotification $record): bool => is_null($record->read_at)),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNotifications::route('/'),
        ];
    }
}
