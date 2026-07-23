<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnnouncements extends ListRecords
{
    protected static string $resource = AnnouncementResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Announcement::count(), 'label' => 'Total Announcements', 'icon' => 'fa-bullhorn', 'color' => '#3b82f6'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->createAnother(false)->createAnother(false)
                ->icon('heroicon-o-plus-circle')
                ->color('info'),
        ];
    }
}
