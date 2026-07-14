<?php

namespace App\Filament\Widgets\Admin;

use App\Models\Enrollment;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentEnrollmentsWidget extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enrollment::with('user', 'course')
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('user.name')
                    ->label('Student'),
                TextColumn::make('course.title')
                    ->label('Course'),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Enrolled'),
            ]);
    }
}
