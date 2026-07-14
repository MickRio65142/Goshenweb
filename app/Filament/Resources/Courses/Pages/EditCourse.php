<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        $this->record->refresh();
        $students = \App\Models\User::whereHas('enrolledCourses', fn($q) => $q->where('course_id', $this->record->id))->get();
        \Illuminate\Support\Facades\Notification::send($students, new \App\Notifications\CourseUpdated($this->record));
    }
}
