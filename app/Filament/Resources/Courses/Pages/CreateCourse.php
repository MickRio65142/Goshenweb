<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        $students = \App\Models\User::where('role', 'student')->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\CourseCreated($this->record));
    }
}
