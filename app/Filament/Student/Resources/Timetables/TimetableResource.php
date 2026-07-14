<?php

namespace App\Filament\Student\Resources\Timetables;

use App\Filament\Student\Resources\Timetables\Pages;
use App\Models\Timetable;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use UnitEnum;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?int $navigationSort = 3;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-calendar-days';
    protected static ?string $navigationLabel = 'Class Timetables';
    protected static ?string $modelLabel = 'Timetable';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Academics';
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
                    ->label('Timetable Name')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('description')
                    ->label('Details')
                    ->wrap()
                    ->placeholder('No extra details'),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->date('M d, Y'),
            ])
            ->filters([])
            ->actions([
                Action::make('download')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn (Timetable $record): string => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTimetables::route('/'),
        ];
    }
}