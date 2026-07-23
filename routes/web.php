<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DirectRegistrationController;
use App\Http\Controllers\ContactController;
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
Route::post('/contact-us', [ContactController::class, 'submitContact'])->name('contact.submit');
Route::post('/enquiry', [ContactController::class, 'submitEnquiry'])->name('enquiry.submit');

Route::get('/packages', [CourseController::class, 'packagesIndex'])->name('packages.index');

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
Route::get('/register/gold', [DirectRegistrationController::class, 'showGoldForm'])->name('register.gold');
Route::post('/register/gold', [DirectRegistrationController::class, 'submitGoldRegistration'])->name('register.gold.submit');
Route::get('/register/health', [DirectRegistrationController::class, 'showHealthForm'])->name('register.health');
Route::post('/register/health', [DirectRegistrationController::class, 'submitHealthRegistration'])->name('register.health.submit');
Route::get('/register/silver', [DirectRegistrationController::class, 'showSilverForm'])->name('register.silver');
Route::post('/register/silver', [DirectRegistrationController::class, 'submitSilverRegistration'])->name('register.silver.submit');
Route::get('/register/{slug}', [DirectRegistrationController::class, 'showForm'])->name('register.show');
Route::post('/register/{slug}', [DirectRegistrationController::class, 'submitRegistration'])->name('register.submit');

// Google OAuth
Route::get('/auth/google/redirect', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('auth.google.callback');

// Student Exam Routes (authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/student/exams/{exam}/start', [App\Http\Controllers\StudentExamController::class, 'start'])->name('student.exam.start');
    Route::get('/student/exams/take/{attempt}', [App\Http\Controllers\StudentExamController::class, 'take'])->name('student.exam.take');
    Route::post('/student/exams/submit/{attempt}', [App\Http\Controllers\StudentExamController::class, 'submit'])->name('student.exam.submit');
    Route::get('/student/exams/result/{attempt}', [App\Http\Controllers\StudentExamController::class, 'result'])->name('student.exam.result');
});

// Enrollment & Student Portal handled by Filament
Route::redirect('/enroll', '/packages');

// Mark notification as read
Route::get('/student/notifications/{id}/mark-as-read', function ($id) {
    $notification = auth()->user()->notifications()->findOrFail($id);
    $notification->markAsRead();
    return back();
})->middleware('auth')->name('student.notifications.mark-as-read');

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

Route::post('/student/certificates/generate', [\App\Http\Controllers\CertificateController::class, 'generate'])->middleware('auth')->name('student.certificates.generate');

Route::get('/sitemap.xml', function () {
    $urls = [
        ['loc' => '/', 'priority' => '1.0'],
        ['loc' => '/about-us', 'priority' => '0.9'],
        ['loc' => '/courses', 'priority' => '0.9'],
        ['loc' => '/packages', 'priority' => '0.9'],
        ['loc' => '/gallery', 'priority' => '0.7'],
        ['loc' => '/contact-us', 'priority' => '0.8'],
        ['loc' => '/pricing', 'priority' => '0.8'],
        ['loc' => '/certifications', 'priority' => '0.7'],
        ['loc' => '/events', 'priority' => '0.7'],
        ['loc' => '/faqs', 'priority' => '0.6'],
        ['loc' => '/privacy', 'priority' => '0.4'],
        ['loc' => '/terms', 'priority' => '0.4'],
        ['loc' => '/cookies', 'priority' => '0.4'],
        ['loc' => '/refunds', 'priority' => '0.4'],
    ];

    $courseSlugs = ['social-care', 'nursing-aid', 'health-safety', 'first-aid-cpr', 'hospitality-tourism', 'customer-service', 'travel-business', 'airline-ticketing', 'personal-support-worker'];
    foreach ($courseSlugs as $slug) {
        $urls[] = ['loc' => "/courses/$slug", 'priority' => '0.8'];
    }

    $packageSlugs = ['healthcare', 'silver', 'gold'];
    foreach ($packageSlugs as $slug) {
        $urls[] = ['loc' => "/packages/$slug", 'priority' => '0.8'];
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    foreach ($urls as $url) {
        $xml .= '  <url>' . "\n";
        $xml .= '    <loc>' . url($url['loc']) . '</loc>' . "\n";
        $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
        $xml .= '  </url>' . "\n";
    }
    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'text/xml');
});

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});