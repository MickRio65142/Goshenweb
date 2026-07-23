<?php

namespace App\Filament\Resources\Certificates\Pages;

use App\Filament\Resources\Certificates\CertificateResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCertificates extends ListRecords
{
    protected static string $resource = CertificateResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Certificate::count(), 'label' => 'Total Certificates', 'icon' => 'fa-certificate', 'color' => '#f5a524'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->createAnother(false)
                ->icon('heroicon-o-plus-circle')
                ->color('warning'),
        ];
    }
}
