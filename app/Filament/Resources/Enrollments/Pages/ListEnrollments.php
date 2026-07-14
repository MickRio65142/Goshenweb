<?php

namespace App\Filament\Resources\Enrollments\Pages;

use App\Filament\Resources\Enrollments\EnrollmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEnrollments extends ListRecords
{
    protected static string $resource = EnrollmentResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\Enrollment::count(), 'label' => 'Total Enrollments', 'icon' => 'fa-users', 'color' => '#091c3d'],
            ['value' => \App\Models\Enrollment::where('status', 'active')->count(), 'label' => 'Active', 'icon' => 'fa-check-circle', 'color' => '#16a34a'],
            ['value' => \App\Models\Enrollment::where('status', 'pending')->count(), 'label' => 'Pending', 'icon' => 'fa-clock', 'color' => '#ca8a04'],
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
