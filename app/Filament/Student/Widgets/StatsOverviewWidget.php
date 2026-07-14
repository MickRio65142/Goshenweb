<?php

namespace App\Filament\Student\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Enrollment;
use App\Models\LiveClass;
use App\Models\StudentDocument;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id();

        return [
            Stat::make('Enrolled Courses', Enrollment::where('user_id', $userId)->count())
                ->description('Active & completed courses')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('info'),

            Stat::make('Upcoming Live Classes', LiveClass::whereHas('course.enrollments', fn ($q) => $q->where('user_id', $userId))
                ->where('scheduled_at', '>=', now())
                ->count())
                ->description('Scheduled sessions')
                ->descriptionIcon('heroicon-o-video-camera')
                ->color('success'),

            Stat::make('Pending Documents', StudentDocument::where('user_id', $userId)
                ->where('status', 'pending')
                ->count())
                ->description('Awaiting admin review')
                ->descriptionIcon('heroicon-o-document-arrow-up')
                ->color('warning'),

            Stat::make('Upcoming Events', Event::where('event_date', '>=', now())->count())
                ->description('Academic calendar')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('danger'),
        ];
    }
}
