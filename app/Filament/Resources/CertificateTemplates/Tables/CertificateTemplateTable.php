<?php

namespace App\Filament\Resources\CertificateTemplates\Tables;

use App\Filament\Resources\CertificateTemplates\CertificateTemplateResource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CertificateTemplateTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('orientation')
                    ->badge(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'gray',
                    }),
                TextColumn::make('courses_count')
                    ->label('Courses')
                    ->counts('courses'),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
            ->actions([
                Action::make('design')
                    ->label('Design')
                    ->icon('heroicon-o-pencil-square')
                    ->url(fn ($record) => CertificateTemplateResource::getUrl('design', ['record' => $record])),
                EditAction::make(),
            ]);
    }
}
