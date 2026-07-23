<?php

namespace App\Filament\Student\Pages;

use App\Models\Enrollment;
use App\Models\Certificate;
use App\Models\LiveClass;
use App\Models\Grade;
use App\Models\Event;
use App\Models\Announcement;
use App\Models\Book;
use App\Models\StudentDocument;
use App\Models\Timetable;
use App\Models\Transaction;
use App\Http\Controllers\CourseController;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class StudentDashboard extends Page
{
    protected static ?string $pollingInterval = '30s';

    protected string $view = 'filament.student.dashboard';

    public static function getNavigationLabel(): string
    {
        return 'Dashboard';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-home';
    }

    public static function getNavigationSort(): ?int
    {
        return 0;
    }

    public function getTitle(): string
    {
        return 'Dashboard';
    }

    public function getStudentName(): string
    {
        return auth()->user()->name;
    }

    public function getUserAvatar(): string
    {
        $user = auth()->user();
        return $user->avatar_url
            ? asset('storage/' . $user->avatar_url)
            : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0d9488&color=fff&size=200';
    }

    public function getStudentProgram(): string
    {
        $enrollment = Enrollment::where('user_id', auth()->id())->with('course')->first();
        return $enrollment ? $enrollment->course->name : 'No Program Assigned';
    }

    public function getStats(): array
    {
        $userId = auth()->id();

        return [
            [
                'label' => 'Enrolled Courses',
                'value' => Enrollment::where('user_id', $userId)->count(),
                'icon' => 'fa-graduation-cap',
                'color' => '#0d9488',
                'route' => url('/student/enrollments'),
            ],
            [
                'label' => 'Results',
                'value' => Grade::where('user_id', $userId)->count(),
                'icon' => 'fa-chart-bar',
                'color' => '#14b8a6',
                'route' => url('/student/grades'),
            ],
            [
                'label' => 'Timetable',
                'value' => Timetable::count(),
                'icon' => 'fa-calendar-alt',
                'color' => '#0891b2',
                'route' => url('/student/timetables'),
            ],
            [
                'label' => 'Pending Documents',
                'value' => StudentDocument::where('user_id', $userId)->where('status', 'pending')->count(),
                'icon' => 'fa-file-upload',
                'color' => '#d97706',
                'route' => url('/student/student-documents'),
            ],
            [
                'label' => 'Upcoming Events',
                'value' => Event::where('event_date', '>=', now())->count(),
                'icon' => 'fa-calendar-check',
                'color' => '#dc2626',
                'route' => url('/student/events'),
            ],
            [
                'label' => 'Digital Library',
                'value' => Book::count(),
                'icon' => 'fa-book',
                'color' => '#7c3aed',
                'route' => url('/student/books'),
            ],
            [
                'label' => 'Transactions',
                'value' => Transaction::where('user_id', $userId)->count(),
                'icon' => 'fa-credit-card',
                'color' => '#059669',
                'route' => url('/student/transactions'),
            ],
            [
                'label' => 'Certificates',
                'value' => Certificate::where('user_id', $userId)->where('status', 'available')->count(),
                'icon' => 'fa-certificate',
                'color' => '#ca8a04',
                'route' => url('/student/certificates'),
            ],
            [
                'label' => 'My Exams',
                'value' => \App\Models\Exam::whereIn('course_id', Enrollment::where('user_id', $userId)->pluck('course_id'))->where('is_active', true)->count(),
                'icon' => 'fa-pencil',
                'color' => '#c1121f',
                'route' => url('/student/exams'),
            ],
            [
                'label' => 'Academic Calendar',
                'value' => 'View',
                'icon' => 'fa-calendar-plus',
                'color' => '#2563eb',
                'route' => url('/student/academic-calendar'),
            ],
        ];
    }

    public function getEnrolledCourses(): array
    {
        $userId = auth()->id();
        $courseData = (new CourseController())->getCourses();

        $enrollments = Enrollment::where('user_id', $userId)
            ->with('course')
            ->get()
            ->sortBy(fn($e) => match ($e->status) {
                'active' => 0,
                'pending' => 1,
                'completed' => 2,
                'suspended' => 3,
                default => 99,
            });

        $result = [];

        foreach ($enrollments as $enrollment) {
            $slug = $enrollment->course->code;
            $hc = $courseData[$slug] ?? null;

            $grade = Grade::where('user_id', $userId)
                ->where('course_id', $enrollment->course_id)
                ->first();

            $nextClass = LiveClass::where('course_id', $enrollment->course_id)
                ->where('scheduled_at', '>', now())
                ->orderBy('scheduled_at')
                ->first();

            $events = Event::where('event_date', '>=', now())
                ->orderBy('event_date')
                ->take(3)
                ->get();

            $result[] = [
                'id' => $enrollment->id,
                'slug' => $slug,
                'title' => $hc['title'] ?? $enrollment->course->name,
                'category' => $hc['category'] ?? 'General',
                'image' => $hc['hero_image'] ? asset($hc['hero_image']) : null,
                'description' => $hc['description'] ?? '',
                'modules' => $hc['modules'] ?? [],
                'packagePrice' => $hc['summary']['package_price'] ?? '',
                'duration' => $hc['summary']['duration'] ?? '',
                'progress' => $enrollment->progress_percentage,
                'status' => $enrollment->status,
                'paymentStatus' => $enrollment->payment_status,
                'outstandingBalance' => number_format($enrollment->outstanding_balance, 0, ',', ' '),
                'grade' => $grade ? $grade->grade_letter : null,
                'totalMark' => $grade ? $grade->total_mark : null,
                'nextLiveClass' => $nextClass ? [
                    'title' => 'Live Class',
                    'scheduledAt' => $nextClass->scheduled_at->format('M d, Y - g:i A'),
                    'platform' => $nextClass->platform,
                    'joinUrl' => $nextClass->join_url,
                ] : null,
                'upcomingEvents' => $events->map(fn($e) => [
                    'title' => $e->title,
                    'date' => $e->event_date->format('M d, Y'),
                    'type' => $e->event_type,
                ])->toArray(),
            ];
        }

        return $result;
    }

    public function getEnrolledCoursesJson(): string
    {
        return json_encode($this->getEnrolledCourses());
    }

    public function getOverallProgress(): int
    {
        $userId = auth()->id();
        $enrollments = Enrollment::where('user_id', $userId)->get();
        
        if ($enrollments->isEmpty()) {
            return 0;
        }
        
        return (int) $enrollments->avg('progress_percentage');
    }

    public function getContinueCourse(): ?array
    {
        $userId = auth()->id();
        
        $enrollment = Enrollment::where('user_id', $userId)
            ->where('status', 'active')
            ->with('course')
            ->orderBy('updated_at', 'desc')
            ->first();
        
        if (!$enrollment) {
            return null;
        }
        
        $courseData = (new CourseController())->getCourses();
        $slug = $enrollment->course->code;
        $hc = $courseData[$slug] ?? null;
        
        return [
            'id' => $enrollment->id,
            'slug' => $slug,
            'title' => $hc['title'] ?? $enrollment->course->name,
            'category' => $hc['category'] ?? 'General',
            'image' => $hc['hero_image'] ? asset($hc['hero_image']) : null,
            'description' => $hc['description'] ?? '',
            'modules' => $hc['modules'] ?? [],
            'packagePrice' => $hc['summary']['package_price'] ?? '',
            'duration' => $hc['summary']['duration'] ?? '',
            'progress' => $enrollment->progress_percentage,
            'status' => $enrollment->status,
            'paymentStatus' => $enrollment->payment_status,
            'outstandingBalance' => number_format($enrollment->outstanding_balance, 0, ',', ' '),
            'grade' => null,
            'totalMark' => null,
            'nextLiveClass' => null,
            'upcomingEvents' => [],
        ];
    }

    public function getLiveClasses(): array
    {
        $userId = auth()->id();

        return LiveClass::whereHas('course.enrollments', fn($q) => $q->where('user_id', $userId))
            ->where('scheduled_at', '>=', now())
            ->with('course')
            ->orderBy('scheduled_at')
            ->take(5)
            ->get()
            ->map(fn($class) => [
                'id' => $class->id,
                'courseName' => $class->course->name,
                'platform' => $class->platform,
                'joinUrl' => $class->join_url,
                'scheduledAt' => $class->scheduled_at->format('M d, Y - g:i A'),
            ])->toArray();
    }

    public function getAnnouncements(): array
    {
        return Announcement::latest()->take(5)->get()->map(fn($a) => [
            'title' => $a->title,
            'body' => $a->content,
            'time' => $a->created_at->diffForHumans(),
            'priority' => $a->priority,
        ])->toArray();
    }
}
