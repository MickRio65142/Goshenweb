<?php

namespace App\Filament\Resources\ClassEvents\Pages;

use App\Filament\Resources\ClassEvents\ClassEventResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassEvent extends CreateRecord
{
    protected static string $resource = ClassEventResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        $students = \App\Models\User::whereHas('enrolledCourses', fn($q) => $q->where('course_id', $this->record->course_id))->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\LiveClassScheduled($this->record));
    }
}
