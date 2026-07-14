<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DirectRegistrationController;
use App\Models\Event;
use App\Models\Certificate;
use App\Http\Controllers\SocialiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about');
});

// 1. GENERAL COURSES PAGE MUST BE FIRST
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// 2. SPECIFIC COURSE DETAIL PAGE MUST BE SECOND
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/gallery', function () { return view('gallery'); });

Route::get('/contact-us', function () { return view('contact'); });

Route::get('/packages', function () { return view('packages.index'); });

Route::get('/packages/{slug}', [CourseController::class, 'showPackage'])->name('packages.show');

Route::get('/pricing', function () { return view('pricing'); }); 
Route::get('/certifications', function () { return view('certifications'); });

// Legal Pages
Route::get('/privacy', function () { return view('privacy'); });
Route::get('/terms', function () { return view('terms'); });
Route::get('/cookies', function () { return view('cookies'); });
Route::get('/refunds', function () { return view('refunds'); });

// Events Page
Route::get('/events', function () {
    $upcomingEvents = Event::where('event_date', '>=', now())
        ->orderBy('event_date')
        ->get();
    $pastEvents = Event::where('event_date', '<', now())
        ->orderBy('event_date', 'desc')
        ->take(3)
        ->get();
    return view('events', compact('upcomingEvents', 'pastEvents'));
});

// Certificate Verification
Route::get('/certificates/verify', function () {
    $certificate = null;
    $searched = false;
    if (request()->has('certificate_number')) {
        $searched = true;
        $certificate = Certificate::where('certificate_number', request('certificate_number'))
            ->where('status', 'issued')
            ->with('user', 'course')
            ->first();
    }
    return view('certificates-verify', compact('certificate', 'searched'));
});

// Support Pages
Route::get('/faqs', function () { return view('faqs'); });

// Direct Registration Routes (no exam required)
Route::get('/register/{slug}', [DirectRegistrationController::class, 'showForm'])->name('register.show');
Route::post('/register/{slug}', [DirectRegistrationController::class, 'submitRegistration'])->name('register.submit');

// Google OAuth
Route::get('/auth/google/redirect', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Student Exam Routes (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/student/exams/{exam}/start', [App\Http\Controllers\StudentExamController::class, 'start'])->name('student.exam.start');
    Route::get('/student/exams/take/{attemptId}', [App\Http\Controllers\StudentExamController::class, 'take'])->name('student.exam.take');
    Route::post('/student/exams/submit/{attemptId}', [App\Http\Controllers\StudentExamController::class, 'submit'])->name('student.exam.submit');
    Route::get('/student/exams/result/{attemptId}', [App\Http\Controllers\StudentExamController::class, 'result'])->name('student.exam.result');
});

// Enrollment & Student Portal handled by Filament
Route::redirect('/enroll', '/packages');

// Student notification polling (real-time)
Route::get('/student/notifications/poll', function () {
    $user = auth()->user();
    if (!$user) { return response()->json(['unread_count' => 0, 'notifications' => []]); }
    $notifications = $user->notifications()->latest()->take(5)->get()->map(fn($n) => [
        'id' => $n->id,
        'title' => $n->data['title'] ?? 'Notification',
        'body' => \Illuminate\Support\Str::limit($n->data['body'] ?? '', 60),
        'time' => $n->created_at->diffForHumans(),
        'read' => !is_null($n->read_at),
    ]);
    return response()->json([
        'unread_count' => $user->unreadNotifications()->count(),
        'notifications' => $notifications,
    ]);
})->middleware('auth');

// Admin notification polling
Route::get('/admin/notifications/poll', function () {
    $user = auth()->user();
    if (!$user) { return response()->json(['unread_count' => 0, 'notifications' => []]); }
    $notifications = $user->notifications()->latest()->take(5)->get()->map(fn($n) => [
        'id' => $n->id,
        'title' => $n->data['title'] ?? 'Notification',
        'body' => \Illuminate\Support\Str::limit($n->data['body'] ?? '', 60),
        'time' => $n->created_at->diffForHumans(),
        'read' => !is_null($n->read_at),
    ]);
    return response()->json([
        'unread_count' => $user->unreadNotifications()->count(),
        'notifications' => $notifications,
    ]);
})->middleware('auth');

Route::fallback(function () {
    return '<div style="text-align:center; padding:50px; font-family:sans-serif;">
                <h1>Page Coming Soon</h1>
                <p>We are still building this section of the website.</p>
                <a href="/" style="color:blue;">Go Back Home</a>
            </div>';
});