<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        $students = \App\Models\User::where('role', 'student')->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\EventCreated($this->record));
    }
}
