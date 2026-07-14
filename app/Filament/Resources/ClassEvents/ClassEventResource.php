<?php

namespace App\Filament\Resources\ClassEvents;

use App\Filament\Resources\ClassEvents\Pages\CreateClassEvent;
use App\Filament\Resources\ClassEvents\Pages\EditClassEvent;
use App\Filament\Resources\ClassEvents\Pages\ListClassEvents;
use App\Filament\Resources\ClassEvents\Schemas\ClassEventForm;
use App\Filament\Resources\ClassEvents\Tables\ClassEventsTable;
use App\Models\LiveClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassEventResource extends Resource
{
    protected static ?string $model = LiveClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'platform';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return ClassEventForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassEventsTable::configure($table);
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Live Learning';
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClassEvents::route('/'),
            'create' => CreateClassEvent::route('/create'),
            'edit' => EditClassEvent::route('/{record}/edit'),
        ];
    }
}
