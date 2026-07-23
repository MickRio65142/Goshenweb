<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Setting;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class DirectRegistrationController extends Controller
{
    private function getCampusEmail($campus)
    {
        return match ($campus) {
            'douala' => 'Douala@goshenworkskill.com',
            'limbe' => 'Limbe@goshenworkskill.com',
            default => 'Info@goshenworkskill.com',
        };
    }

    private function getCampusLabel($campus)
    {
        return $campus === 'douala' ? 'Douala Main Campus' : 'Limbe Campus';
    }

    public function showForm(string $slug)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return view('portal-closed');
        }

        $courses = (new CourseController)->getCourses();
        if (!isset($courses[$slug])) {
            abort(404);
        }
        $course = $courses[$slug];

        $courseRecord = Course::where('code', $slug)->first();
        $courseId = $courseRecord?->id;

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();
        $paymentInstructions = $paymentService->getPaymentInstructions();

        return view('register', compact(
            'course', 'slug', 'courseId',
            'registrationFee', 'paymentInstructions'
        ));
    }

    public function submitRegistration(Request $request, string $slug)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return back()->with('error', 'Registration is currently closed.');
        }

        $courses = (new CourseController)->getCourses();
        if (!isset($courses[$slug])) {
            abort(404);
        }
        $course = $courses[$slug];

        $courseRecord = Course::where('code', $slug)->first();
        $courseId = $courseRecord?->id;

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string|max:100',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'education_level' => 'nullable|string|max:100',
            'heard_about_us' => 'nullable|string|max:100',
            'password' => 'required|string|min:8|confirmed',
            'campus' => 'required|in:douala,limbe',
            'terms_accepted' => 'accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'],
            'role' => 'student',
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'address' => $validated['address'] ?? null,
            'emergency_contact_name' => $validated['emergency_contact_name'] ?? null,
            'emergency_contact_phone' => $validated['emergency_contact_phone'] ?? null,
            'education_level' => $validated['education_level'] ?? null,
            'heard_about_us' => $validated['heard_about_us'] ?? null,
        ]);

        if ($courseId) {
            Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $courseId,
                'status' => 'pending',
                'payment_status' => 'unpaid',
            ]);
        }

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\NewRegistration($user, $course['title'] ?? ''));

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            Mail::raw(
                "New Course Registration\n\n" .
                "Course: {$course['title']}\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Date of Birth: {$validated['date_of_birth']}\n" .
                "Gender: {$validated['gender']}\n" .
                "Nationality: {$validated['nationality']}\n" .
                "Address: " . ($validated['address'] ?? 'N/A') . "\n" .
                "Education Level: " . ($validated['education_level'] ?? 'N/A') . "\n" .
                "Heard About Us: " . ($validated['heard_about_us'] ?? 'N/A') . "\n" .
                "Emergency Contact: " . ($validated['emergency_contact_name'] ?? 'N/A') . " - " . ($validated['emergency_contact_phone'] ?? 'N/A'),
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('New Registration - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Registration email failed: ' . $e->getMessage());
        }

        auth()->login($user);

        return redirect('/student')->with('success', 'Your application has been submitted successfully! Welcome to Goshen Work Skill Association.');
    }

    public function showHealthForm()
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return view('portal-closed');
        }

        $selectedSlugs = ['social-care', 'nursing-aid', 'first-aid-cpr'];

        $allCourses = (new CourseController)->getCourses();
        $selectedCourses = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $selectedCourses[] = $allCourses[$slug];
            }
        }

        if (count($selectedCourses) < 1) {
            return redirect('/packages')->with('error', 'Package courses not found.');
        }

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();
        $paymentInstructions = $paymentService->getPaymentInstructions();

        return view('register-health', compact(
            'selectedCourses', 'selectedSlugs',
            'registrationFee', 'paymentInstructions'
        ));
    }

    public function submitHealthRegistration(Request $request)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return back()->with('error', 'Registration is currently closed.');
        }

        $selectedSlugs = ['social-care', 'nursing-aid', 'first-aid-cpr'];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string|max:100',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'education_level' => 'nullable|string|max:100',
            'heard_about_us' => 'nullable|string|max:100',
            'password' => 'required|string|min:8|confirmed',
            'campus' => 'required|in:douala,limbe',
            'terms_accepted' => 'accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'],
            'role' => 'student',
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'address' => $validated['address'] ?? null,
            'emergency_contact_name' => $validated['emergency_contact_name'] ?? null,
            'emergency_contact_phone' => $validated['emergency_contact_phone'] ?? null,
            'education_level' => $validated['education_level'] ?? null,
            'heard_about_us' => $validated['heard_about_us'] ?? null,
        ]);

        $allCourses = (new CourseController)->getCourses();

        foreach ($selectedSlugs as $slug) {
            $courseRecord = Course::where('code', $slug)->first();
            if ($courseRecord) {
                Enrollment::create([
                    'user_id' => $user->id,
                    'course_id' => $courseRecord->id,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                ]);
            }
        }

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\NewRegistration($user, 'Healthcare Package'));

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            $courseTitles = array_map(fn($s) => $allCourses[$s]['title'] ?? $s, $selectedSlugs);
            Mail::raw(
                "New Healthcare Package Registration\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Date of Birth: {$validated['date_of_birth']}\n" .
                "Gender: {$validated['gender']}\n" .
                "Nationality: {$validated['nationality']}\n" .
                "Address: " . ($validated['address'] ?? 'N/A') . "\n" .
                "Education Level: " . ($validated['education_level'] ?? 'N/A') . "\n" .
                "Heard About Us: " . ($validated['heard_about_us'] ?? 'N/A') . "\n" .
                "Courses: " . implode(', ', $courseTitles) . "\n" .
                "Emergency Contact: " . ($validated['emergency_contact_name'] ?? 'N/A') . " - " . ($validated['emergency_contact_phone'] ?? 'N/A'),
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('Healthcare Package Registration - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Healthcare registration email failed: ' . $e->getMessage());
        }

        auth()->login($user);

        return redirect('/student')->with('success', 'Your Healthcare Package application has been submitted successfully! Welcome to Goshen Work Skill Association.');
    }

    public function showSilverForm()
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return view('portal-closed');
        }

        $selectedSlugs = ['hospitality-tourism', 'airline-ticketing', 'customer-service'];

        $allCourses = (new CourseController)->getCourses();
        $selectedCourses = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $selectedCourses[] = $allCourses[$slug];
            }
        }

        if (count($selectedCourses) < 1) {
            return redirect('/packages')->with('error', 'Package courses not found.');
        }

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();
        $paymentInstructions = $paymentService->getPaymentInstructions();

        return view('register-silver', compact(
            'selectedCourses', 'selectedSlugs',
            'registrationFee', 'paymentInstructions'
        ));
    }

    public function submitSilverRegistration(Request $request)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return back()->with('error', 'Registration is currently closed.');
        }

        $selectedSlugs = ['hospitality-tourism', 'airline-ticketing', 'customer-service'];

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string|max:100',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'education_level' => 'nullable|string|max:100',
            'heard_about_us' => 'nullable|string|max:100',
            'password' => 'required|string|min:8|confirmed',
            'campus' => 'required|in:douala,limbe',
            'terms_accepted' => 'accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'],
            'role' => 'student',
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'address' => $validated['address'] ?? null,
            'emergency_contact_name' => $validated['emergency_contact_name'] ?? null,
            'emergency_contact_phone' => $validated['emergency_contact_phone'] ?? null,
            'education_level' => $validated['education_level'] ?? null,
            'heard_about_us' => $validated['heard_about_us'] ?? null,
        ]);

        $allCourses = (new CourseController)->getCourses();

        foreach ($selectedSlugs as $slug) {
            $courseRecord = Course::where('code', $slug)->first();
            if ($courseRecord) {
                Enrollment::create([
                    'user_id' => $user->id,
                    'course_id' => $courseRecord->id,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                ]);
            }
        }

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\NewRegistration($user, 'Silver Package'));

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            $courseTitles = array_map(fn($s) => $allCourses[$s]['title'] ?? $s, $selectedSlugs);
            Mail::raw(
                "New Silver Package Registration\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Date of Birth: {$validated['date_of_birth']}\n" .
                "Gender: {$validated['gender']}\n" .
                "Nationality: {$validated['nationality']}\n" .
                "Address: " . ($validated['address'] ?? 'N/A') . "\n" .
                "Education Level: " . ($validated['education_level'] ?? 'N/A') . "\n" .
                "Heard About Us: " . ($validated['heard_about_us'] ?? 'N/A') . "\n" .
                "Courses: " . implode(', ', $courseTitles) . "\n" .
                "Emergency Contact: " . ($validated['emergency_contact_name'] ?? 'N/A') . " - " . ($validated['emergency_contact_phone'] ?? 'N/A'),
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('Silver Package Registration - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Silver registration email failed: ' . $e->getMessage());
        }

        auth()->login($user);

        return redirect('/student')->with('success', 'Your Silver Package application has been submitted successfully! Welcome to Goshen Work Skill Association.');
    }

    public function showGoldForm(Request $request)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return view('portal-closed');
        }

        $courseSlugs = $request->query('courses', '');
        if (empty($courseSlugs)) {
            return redirect('/packages/gold')->with('error', 'Please select at least 6 courses.');
        }

        $selectedSlugs = explode(',', $courseSlugs);

        $allCourses = (new CourseController)->getCourses();
        $selectedCourses = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $selectedCourses[] = $allCourses[$slug];
            }
        }

        if (count($selectedCourses) < 1) {
            return redirect('/packages/gold')->with('error', 'Invalid course selection.');
        }

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();
        $paymentInstructions = $paymentService->getPaymentInstructions();

        return view('register-gold', compact(
            'selectedCourses', 'selectedSlugs',
            'registrationFee', 'paymentInstructions'
        ));
    }

    public function submitGoldRegistration(Request $request)
    {
        $portalOpen = Setting::where('key', 'portal_open')->value('value');
        if ($portalOpen !== 'true') {
            return back()->with('error', 'Registration is currently closed.');
        }

        $courseSlugs = $request->input('selected_courses', '');
        $selectedSlugs = explode(',', $courseSlugs);

        $allCourses = (new CourseController)->getCourses();
        $validSlugs = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $validSlugs[] = $slug;
            }
        }

        if (count($validSlugs) < 1) {
            return back()->with('error', 'Invalid course selection.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'nationality' => 'required|string|max:100',
            'address' => 'nullable|string|max:500',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'education_level' => 'nullable|string|max:100',
            'heard_about_us' => 'nullable|string|max:100',
            'password' => 'required|string|min:8|confirmed',
            'campus' => 'required|in:douala,limbe',
            'terms_accepted' => 'accepted',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'],
            'role' => 'student',
            'date_of_birth' => $validated['date_of_birth'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'address' => $validated['address'] ?? null,
            'emergency_contact_name' => $validated['emergency_contact_name'] ?? null,
            'emergency_contact_phone' => $validated['emergency_contact_phone'] ?? null,
            'education_level' => $validated['education_level'] ?? null,
            'heard_about_us' => $validated['heard_about_us'] ?? null,
        ]);

        foreach ($validSlugs as $slug) {
            $courseRecord = Course::where('code', $slug)->first();
            if ($courseRecord) {
                Enrollment::create([
                    'user_id' => $user->id,
                    'course_id' => $courseRecord->id,
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                ]);
            }
        }

        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\NewRegistration($user, 'Gold Package'));

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            Mail::raw(
                "New Gold Package Registration\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Date of Birth: {$validated['date_of_birth']}\n" .
                "Gender: {$validated['gender']}\n" .
                "Nationality: {$validated['nationality']}\n" .
                "Address: " . ($validated['address'] ?? 'N/A') . "\n" .
                "Education Level: " . ($validated['education_level'] ?? 'N/A') . "\n" .
                "Heard About Us: " . ($validated['heard_about_us'] ?? 'N/A') . "\n" .
                "Selected Courses: " . implode(', ', array_map(fn($s) => $allCourses[$s]['title'] ?? $s, $validSlugs)) . "\n" .
                "Emergency Contact: " . ($validated['emergency_contact_name'] ?? 'N/A') . " - " . ($validated['emergency_contact_phone'] ?? 'N/A'),
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('Gold Package Registration - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Gold registration email failed: ' . $e->getMessage());
        }

        auth()->login($user);

        return redirect('/student')->with('success', 'Your Gold Package application has been submitted successfully! Welcome to Goshen Work Skill Association.');
    }
}
