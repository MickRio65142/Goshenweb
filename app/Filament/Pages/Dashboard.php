<?php

namespace App\Filament\Pages;

use App\Models\User;
use App\Models\Enrollment;
use App\Models\Course;
use App\Models\StudentDocument;
use App\Models\Event;
use App\Models\LiveClass;
use App\Models\Grade;
use App\Models\Announcement;
use App\Models\Transaction;
use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected string $view = 'filament.admin.pages.dashboard';

    public function getStats(): array
    {
        return [
            ['value' => User::where('role', 'student')->count(), 'label' => 'Total Students', 'icon' => 'fa-users', 'color' => '#091c3d'],
            ['value' => Enrollment::where('status', 'active')->count(), 'label' => 'Active Enrollments', 'icon' => 'fa-user-graduate', 'color' => '#16a34a'],
            ['value' => Course::count(), 'label' => 'Total Courses', 'icon' => 'fa-book', 'color' => '#f5a524'],
            ['value' => StudentDocument::where('status', 'pending')->count(), 'label' => 'Pending Documents', 'icon' => 'fa-file-upload', 'color' => '#c1121f'],
        ];
    }

    public function getQuickActions(): array
    {
        return [
            ['label' => 'Create Course', 'desc' => 'Add a new program', 'icon' => 'fa-book', 'color' => '#091c3d', 'route' => url('/admin/courses/create')],
            ['label' => 'Post Announcement', 'desc' => 'Notify all students', 'icon' => 'fa-bullhorn', 'color' => '#c1121f', 'route' => url('/admin/announcements/create')],
            ['label' => 'Schedule Event', 'desc' => 'Add to calendar', 'icon' => 'fa-calendar-plus', 'color' => '#f5a524', 'route' => url('/admin/events/create')],
            ['label' => 'Review Documents', 'desc' => 'Pending approvals', 'icon' => 'fa-file-circle-check', 'color' => '#7c3aed', 'route' => url('/admin/student-documents')],
        ];
    }

    public function getRecentEnrollments()
    {
        return Enrollment::with('user:id,name', 'course:id,title')
            ->latest()
            ->take(8)
            ->get();
    }

    public function getPendingDocuments()
    {
        return StudentDocument::with('user:id,name')
            ->where('status', 'pending')
            ->latest()
            ->take(8)
            ->get();
    }

    public function getTodayEvents()
    {
        return Event::whereDate('event_date', now()->format('Y-m-d'))
            ->orderBy('event_date')
            ->get();
    }

    public function getTodayClasses()
    {
        return LiveClass::whereDate('scheduled_at', now()->format('Y-m-d'))
            ->orderBy('scheduled_at')
            ->with('course')
            ->get();
    }

    public function getRecentGrades()
    {
        return Grade::with('user:id,name', 'course:id,title')
            ->latest()
            ->take(8)
            ->get();
    }

    public function getAdminName(): string
    {
        return Auth::user()->name;
    }

    public function getAdminAvatar(): string
    {
        $user = Auth::user();
        return $user->avatar_url ?: 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=091c3d&color=fff&size=200';
    }
}
