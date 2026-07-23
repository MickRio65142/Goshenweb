<?php

namespace App\Filament\Resources\CertificateTemplates\Pages;

use App\Filament\Resources\CertificateTemplates\CertificateTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCertificateTemplate extends EditRecord
{
    protected static string $resource = CertificateTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('design')
                ->label('Design Fields')
                ->icon('heroicon-o-pencil-square')
                ->url(fn () => CertificateTemplateResource::getUrl('design', ['record' => $this->record])),
        ];
    }
}
