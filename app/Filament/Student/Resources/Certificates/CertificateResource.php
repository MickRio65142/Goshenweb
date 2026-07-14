<?php

namespace App\Filament\Student\Resources\Certificates;

use App\Filament\Student\Resources\Certificates\Pages;
use App\Models\Certificate;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;

    protected static ?int $navigationSort = 1;
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'My Certificates';
    protected static ?string $modelLabel = 'Certificate';

    public static function getNavigationGroup(): string | UnitEnum | null
    {
        return 'Records';
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('course.name')
                    ->label('Course')
                    ->weight('semibold'),
                TextColumn::make('certificate_number')
                    ->label('Cert. No.')
                    ->searchable(),
                TextColumn::make('issue_date')
                    ->label('Issued On')
                    ->date('M d, Y'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'available' => 'success',
                        'revoked' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
            ])
            ->filters([])
            ->actions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn (Certificate $record): string => Storage::url($record->file_path))
                    ->openUrlInNewTab()
                    ->visible(fn (Certificate $record): bool => $record->status === 'available'),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCertificates::route('/'),
        ];
    }
}
