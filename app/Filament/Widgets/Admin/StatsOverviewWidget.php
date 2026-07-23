<?php

namespace App\Filament\Widgets\Admin;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use App\Models\StudentDocument;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Students', User::where('role', 'student')->count())
                ->description('Registered students')
                ->color('info'),
            Stat::make('Active Enrollments', Enrollment::where('status', 'active')->count())
                ->description('Currently enrolled')
                ->color('success'),
            Stat::make('Total Courses', Course::count())
                ->description('Available programs')
                ->color('warning'),
            Stat::make('Pending Documents', StudentDocument::where('status', 'pending')->count())
                ->description('Awaiting review')
                ->color('danger'),
        ];
    }
}
