<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        $students = \App\Models\User::where('role', 'student')->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\AnnouncementCreated($this->record));
    }
}
