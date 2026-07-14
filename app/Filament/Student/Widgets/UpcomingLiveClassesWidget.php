<?php

namespace App\Filament\Student\Widgets;

use App\Models\LiveClass;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;

class UpcomingLiveClassesWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                LiveClass::whereHas('course.enrollments', fn ($q) => $q->where('user_id', Auth::id()))
                    ->where('scheduled_at', '>=', now())
                    ->orderBy('scheduled_at')
                    ->limit(5)
            )
            ->heading('Upcoming Live Classes')
            ->columns([
                TextColumn::make('course.name')
                    ->label('Course')
                    ->weight('semibold'),
                TextColumn::make('platform')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Zoom' => 'info',
                        'Google Meet' => 'success',
                        'WhatsApp' => 'warning',
                        'On-Campus' => 'gray',
                        default => 'gray',
                    }),
                TextColumn::make('scheduled_at')
                    ->label('Scheduled')
                    ->dateTime('M d, Y h:i A'),
            ])
            ->actions([
                Action::make('join')
                    ->label('Join')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('success')
                    ->url(fn (LiveClass $record): ?string => $record->join_url)
                    ->openUrlInNewTab()
                    ->visible(fn (LiveClass $record): bool => !is_null($record->join_url)),
            ]);
    }
}
