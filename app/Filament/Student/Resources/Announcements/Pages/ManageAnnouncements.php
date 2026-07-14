<?php

namespace App\Filament\Student\Resources\Announcements\Pages;

use App\Filament\Student\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\ManageRecords;

class ManageAnnouncements extends ManageRecords
{
    protected static string $resource = AnnouncementResource::class;
    protected string $view = 'filament.student.resources.announcements';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
