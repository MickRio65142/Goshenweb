<?php

namespace App\Filament\Widgets\Admin;

use App\Models\StudentDocument;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentDocumentsWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                StudentDocument::where('status', 'pending')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('user.name')
                    ->label('Student'),
                TextColumn::make('document_name'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Uploaded'),
            ]);
    }
}
