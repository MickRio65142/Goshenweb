<?php

namespace App\Filament\Resources\StudentDocuments\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class StudentDocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Student'),
                TextColumn::make('document_name')
                    ->searchable(),
                TextColumn::make('file_path')
                    ->label('File')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '—';
                        $ext = strtolower(pathinfo($state, PATHINFO_EXTENSION));
                        $icons = [
                            'pdf' => '📄', 'png' => '🖼️', 'jpg' => '🖼️', 'jpeg' => '🖼️',
                            'gif' => '🖼️', 'xlsx' => '📊', 'xls' => '📊',
                            'doc' => '📝', 'docx' => '📝',
                        ];
                        $icon = $icons[$ext] ?? '📁';
                        $name = pathinfo($state, PATHINFO_FILENAME) . '.' . $ext;
                        return $icon . ' ' . $name;
                    })
                    ->url(fn ($state) => $state ? asset('storage/' . $state) : null)
                    ->openUrlInNewTab()
                    ->badge()
                    ->color('info'),
                IconColumn::make('status')
                    ->label('')
                    ->icon(fn (string $state): string => match ($state) {
                        'approved' => 'heroicon-o-check-circle',
                        'rejected' => 'heroicon-o-x-circle',
                        'pending' => 'heroicon-o-clock',
                        default => 'heroicon-o-question-mark-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'rejected' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('admin_feedback')
                    ->label('Feedback')
                    ->limit(30)
                    ->placeholder('—'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Uploaded'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
