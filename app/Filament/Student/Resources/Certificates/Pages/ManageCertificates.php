<?php

namespace App\Filament\Student\Resources\Certificates\Pages;

use App\Filament\Student\Resources\Certificates\CertificateResource;
use Filament\Resources\Pages\ManageRecords;

class ManageCertificates extends ManageRecords
{
    protected static string $resource = CertificateResource::class;
    protected string $view = 'filament.student.resources.certificates';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
