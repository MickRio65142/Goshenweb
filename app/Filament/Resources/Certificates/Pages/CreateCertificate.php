<?php

namespace App\Filament\Resources\Certificates\Pages;

use App\Filament\Resources\Certificates\CertificateResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCertificate extends CreateRecord
{
    protected static string $resource = CertificateResource::class;

    protected string $view = 'filament.admin.resources.create-form';

    protected function afterCreate(): void
    {
        if ($this->record->user) {
            $this->record->user->notify(new \App\Notifications\CertificateIssued($this->record));
        }
    }
}
