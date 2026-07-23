<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Course::count(), 'label' => 'Total Courses', 'icon' => 'fa-book', 'color' => '#091c3d'],
            ['value' => \App\Models\Course::where('status', 'published')->count(), 'label' => 'Published', 'icon' => 'fa-check-circle', 'color' => '#16a34a'],
            ['value' => \App\Models\Course::where('status', 'draft')->count(), 'label' => 'Draft', 'icon' => 'fa-pen', 'color' => '#ca8a04'],
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
