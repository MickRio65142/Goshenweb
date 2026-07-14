<?php

namespace App\Filament\Student\Resources\Books;

use App\Filament\Student\Resources\Books\Pages;
use App\Models\Book;
use Filament\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use UnitEnum;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?int $navigationSort = 1;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Digital Library';
    protected static ?string $modelLabel = 'Library Book';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Resources';
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
                    ->label('Book/Note Title')
                    ->searchable()
                    ->wrap()
                    ->weight('bold'),
                TextColumn::make('author')
                    ->label('Author')
                    ->searchable()
                    ->placeholder('Unknown Author'),
                TextColumn::make('category')
                    ->label('Division/Category')
                    ->badge()
                    ->color('info')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(60)
                    ->wrap(),
            ])
            ->filters([])
            ->actions([
                Action::make('download')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn (Book $record): string => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBooks::route('/'),
        ];
    }
}