<?php

namespace App\Filament\Student\Resources\Announcements;

use App\Filament\Student\Resources\Announcements\Pages;
use App\Models\Announcement;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use UnitEnum;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?int $navigationSort = 1;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationLabel = 'Announcements';
    protected static ?string $modelLabel = 'Notice';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Communication';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Subject')
                    ->searchable()
                    ->wrap()
                    ->weight('bold'),
                TextColumn::make('content')
                    ->label('Announcement Details')
                    ->wrap()
                    ->limit(100),
                TextColumn::make('priority')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'critical' => 'danger',
                        'high' => 'warning',
                        'normal' => 'info',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('created_at')
                    ->label('Posted On')
                    ->date('M d, Y'),
            ])
            ->filters([])
            ->actions([
                \Filament\Actions\ViewAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAnnouncements::route('/'),
        ];
    }
}