<?php

namespace App\Filament\Student\Resources\Timetables\Pages;

use App\Filament\Student\Resources\Timetables\TimetableResource;
use Filament\Resources\Pages\ManageRecords;

class ManageTimetables extends ManageRecords
{
    protected static string $resource = TimetableResource::class;
    protected string $view = 'filament.student.resources.timetables';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
