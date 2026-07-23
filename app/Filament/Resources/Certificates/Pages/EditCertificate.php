<?php

namespace App\Filament\Resources\Certificates\Pages;

use App\Filament\Resources\Certificates\CertificateResource;
use Filament\Resources\Pages\EditRecord;

class EditCertificate extends EditRecord
{
    protected static string $resource = CertificateResource::class;

    protected string $view = 'filament.admin.resources.edit-form';

    protected function afterSave(): void
    {
        $this->record->refresh();
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\CertificateIssued($this->record, 'updated'));
        }
    }
}
