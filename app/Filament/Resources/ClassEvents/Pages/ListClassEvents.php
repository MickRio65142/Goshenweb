<?php

namespace App\Filament\Resources\ClassEvents\Pages;

use App\Filament\Resources\ClassEvents\ClassEventResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassEvents extends ListRecords
{
    protected static string $resource = ClassEventResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\LiveClass::count(), 'label' => 'Total Live Classes', 'icon' => 'fa-video', 'color' => '#091c3d'],
            ['value' => \App\Models\LiveClass::where('status', 'completed')->count(), 'label' => 'Completed', 'icon' => 'fa-check-circle', 'color' => '#16a34a'],
            ['value' => \App\Models\LiveClass::where('status', 'upcoming')->count(), 'label' => 'Upcoming', 'icon' => 'fa-arrow-right', 'color' => '#ca8a04'],
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
