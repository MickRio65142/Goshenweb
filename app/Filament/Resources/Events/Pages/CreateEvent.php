<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEvent extends CreateRecord
{
    protected static string $resource = EventResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        $students = \App\Models\User::where('role', 'student')->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\EventCreated($this->record));
    }
}
