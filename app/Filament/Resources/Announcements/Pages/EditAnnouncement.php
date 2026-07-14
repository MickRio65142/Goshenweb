<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\EditRecord;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        $students = \App\Models\User::where('role', 'student')->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\AnnouncementCreated($this->record));
    }
}
