<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Event::count(), 'label' => 'Total Events', 'icon' => 'fa-calendar', 'color' => '#091c3d'],
            ['value' => \App\Models\Event::where('event_date', '>', now())->count(), 'label' => 'Upcoming', 'icon' => 'fa-arrow-right', 'color' => '#16a34a'],
            ['value' => \App\Models\Event::where('event_date', '<', now())->count(), 'label' => 'Past', 'icon' => 'fa-clock', 'color' => '#dc2626'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('primary'),
        ];
    }
}
