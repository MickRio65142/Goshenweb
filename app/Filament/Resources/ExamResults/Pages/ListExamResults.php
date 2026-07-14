<?php

namespace App\Filament\Resources\ExamResults\Pages;

use App\Filament\Resources\ExamResults\ExamResultResource;
use Filament\Resources\Pages\ListRecords;

class ListExamResults extends ListRecords
{
    protected static string $resource = ExamResultResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\ExamAttempt::count(), 'label' => 'Total Attempts', 'icon' => 'fa-list', 'color' => '#6366f1'],
            ['value' => \App\Models\ExamAttempt::where('score', '>=', 50)->count(), 'label' => 'Passed', 'icon' => 'fa-check', 'color' => '#22c55e'],
            ['value' => \App\Models\ExamAttempt::where('score', '<', 50)->count(), 'label' => 'Failed', 'icon' => 'fa-times', 'color' => '#ef4444'],
        ];
    }
}
