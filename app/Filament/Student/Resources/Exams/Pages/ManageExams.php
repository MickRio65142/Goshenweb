<?php

namespace App\Filament\Student\Resources\Exams\Pages;

use App\Filament\Student\Resources\Exams\ExamResource;
use Filament\Resources\Pages\ListRecords;

class ManageExams extends ListRecords
{
    protected static string $resource = ExamResource::class;
    protected string $view = 'filament.student.resources.exams';

    protected function getHeaderActions(): array
    {
        return [];
    }
}
