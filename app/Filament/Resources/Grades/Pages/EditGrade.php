<?php

namespace App\Filament\Resources\Grades\Pages;

use App\Filament\Resources\Grades\GradeResource;
use Filament\Resources\Pages\EditRecord;

class EditGrade extends EditRecord
{
    protected static string $resource = GradeResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\GradePosted($this->record, 'updated'));
        }
    }
}
