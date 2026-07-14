<?php

namespace App\Filament\Resources\Grades\Pages;

use App\Filament\Resources\Grades\GradeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGrade extends CreateRecord
{
    protected static string $resource = GradeResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\GradePosted($this->record));
        }
    }
}
