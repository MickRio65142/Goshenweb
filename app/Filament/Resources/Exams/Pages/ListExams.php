<?php

namespace App\Filament\Resources\Exams\Pages;

use App\Filament\Resources\Exams\ExamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExams extends ListRecords
{
    protected static string $resource = ExamResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Exam::count(), 'label' => 'Total Exams', 'icon' => 'fa-file-alt', 'color' => '#091c3d'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('primary'),
        ];
    }
}
