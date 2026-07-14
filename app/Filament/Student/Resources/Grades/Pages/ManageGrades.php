<?php

namespace App\Filament\Student\Resources\Grades\Pages;

use App\Filament\Student\Resources\Grades\GradeResource;
use Filament\Resources\Pages\ManageRecords;

class ManageGrades extends ManageRecords
{
    protected static string $resource = GradeResource::class;
    protected string $view = 'filament.student.resources.grades';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
