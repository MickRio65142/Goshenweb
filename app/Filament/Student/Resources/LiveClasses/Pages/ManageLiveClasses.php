<?php

namespace App\Filament\Student\Resources\LiveClasses\Pages;

use App\Filament\Student\Resources\LiveClasses\LiveClassResource;
use Filament\Resources\Pages\ManageRecords;

class ManageLiveClasses extends ManageRecords
{
    protected static string $resource = LiveClassResource::class;
    protected string $view = 'filament.student.resources.live-classes';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
