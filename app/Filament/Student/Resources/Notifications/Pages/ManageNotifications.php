<?php

namespace App\Filament\Student\Resources\Notifications\Pages;

use App\Filament\Student\Resources\Notifications\NotificationResource;
use Filament\Resources\Pages\ManageRecords;

class ManageNotifications extends ManageRecords
{
    protected static string $resource = NotificationResource::class;
    protected string $view = 'filament.student.resources.notifications';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
