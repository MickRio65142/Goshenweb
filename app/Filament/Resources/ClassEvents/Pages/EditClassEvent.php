<?php

namespace App\Filament\Resources\ClassEvents\Pages;

use App\Filament\Resources\ClassEvents\ClassEventResource;
use Filament\Resources\Pages\EditRecord;

class EditClassEvent extends EditRecord
{
    protected static string $resource = ClassEventResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        $students = \App\Models\User::whereHas('enrolledCourses', fn($q) => $q->where('course_id', $this->record->course_id))->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\LiveClassScheduled($this->record));
    }
}
