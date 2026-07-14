<?php

namespace App\Filament\Resources\StudentDocuments\Pages;

use App\Filament\Resources\StudentDocuments\StudentDocumentResource;
use Filament\Resources\Pages\EditRecord;

class EditStudentDocument extends EditRecord
{
    protected static string $resource = StudentDocumentResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\DocumentStatusChanged($this->record));
        }
    }
}
