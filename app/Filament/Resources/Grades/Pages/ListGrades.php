<?php

namespace App\Filament\Resources\Grades\Pages;

use App\Filament\Resources\Grades\GradeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGrades extends ListRecords
{
    protected static string $resource = GradeResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Grade::count(), 'label' => 'Total Grades', 'icon' => 'fa-star', 'color' => '#091c3d'],
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->createAnother(false)
                ->icon('heroicon-o-plus-circle')
                ->color('primary'),
        ];
    }
}
