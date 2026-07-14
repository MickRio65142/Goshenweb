<?php

namespace App\Filament\Student\Resources\Events\Pages;

use App\Filament\Student\Resources\Events\EventResource;
use Filament\Resources\Pages\ManageRecords;

class ManageEvents extends ManageRecords
{
    protected static string $resource = EventResource::class;
    protected string $view = 'filament.student.resources.events';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
