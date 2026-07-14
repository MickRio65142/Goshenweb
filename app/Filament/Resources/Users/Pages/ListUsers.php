<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected string $view = 'filament.admin.resources.list';

    public function getStats(): array
    {
        return [
            ['value' => \App\Models\User::count(), 'label' => 'Total Users', 'icon' => 'fa-users', 'color' => '#091c3d'],
            ['value' => \App\Models\User::where('role', 'student')->count(), 'label' => 'Students', 'icon' => 'fa-user-graduate', 'color' => '#3b82f6'],
            ['value' => \App\Models\User::where('role', 'instructor')->count(), 'label' => 'Instructors', 'icon' => 'fa-chalkboard-teacher', 'color' => '#16a34a'],
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
