<?php

namespace App\Filament\Student\Resources\Enrollments\Pages;

use App\Filament\Student\Resources\Enrollments\EnrollmentResource;
use Filament\Resources\Pages\ManageRecords;

class ManageEnrollments extends ManageRecords
{
    protected static string $resource = EnrollmentResource::class;
    protected string $view = 'filament.student.resources.enrollments';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
