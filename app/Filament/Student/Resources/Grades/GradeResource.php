<?php

namespace App\Filament\Student\Resources\Grades;

use App\Filament\Student\Resources\Grades\Pages;
use App\Models\Grade;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?int $navigationSort = 2;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'My Grades & CA';
    protected static ?string $modelLabel = 'Grades';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Academics';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.name')
                    ->label('Course Name')
                    ->searchable()
                    ->weight('semibold'),
                TextColumn::make('course.code')
                    ->label('Course Code')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('ca_mark')
                    ->label('CA Mark (30%)')
                    ->numeric(2)
                    ->placeholder('N/A')
                    ->alignCenter(),
                TextColumn::make('exam_mark')
                    ->label('Exam Mark (70%)')
                    ->numeric(2)
                    ->placeholder('N/A')
                    ->alignCenter(),
                TextColumn::make('total_mark')
                    ->label('Total (100%)')
                    ->numeric(2)
                    ->placeholder('N/A')
                    ->weight('bold')
                    ->alignCenter(),
                TextColumn::make('grade_letter')
                    ->label('Grade')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'A', 'B' => 'success',
                        'C' => 'warning',
                        'F' => 'danger',
                        default => 'gray',
                    })
                    ->placeholder('-')
                    ->alignCenter(),
            ])
            ->filters([])
            ->actions([])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGrades::route('/'),
        ];
    }
}