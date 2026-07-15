<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Setting;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DirectRegistrationController extends Controller
{
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
            'payment_method' => 'required|in:MTN_MoMo,Orange_Money,Bank_Transfer',
            'transaction_reference' => 'required|string|max:255',
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

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();

        $paymentService->createTransaction([
            'user_id' => $user->id,
            'type' => 'registration_fee',
            'amount' => (float) $registrationFee,
            'payment_method' => $validated['payment_method'],
            'reference' => $validated['transaction_reference'],
            'description' => 'Registration fee - ' . $course['title'],
            'metadata' => ['course_slug' => $slug],
        ]);

        auth()->login($user);

        return redirect('/student')->with('success', 'Account created! Your registration is pending payment confirmation.');
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
        if (count($selectedSlugs) < 6) {
            return redirect('/packages/gold')->with('error', 'Please select at least 6 courses for the Gold package.');
        }

        $allCourses = (new CourseController)->getCourses();
        $selectedCourses = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $selectedCourses[] = $allCourses[$slug];
            }
        }

        if (count($selectedCourses) < 6) {
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

        if (count($selectedSlugs) < 6) {
            return back()->with('error', 'Please select at least 6 courses.');
        }

        $allCourses = (new CourseController)->getCourses();
        $validSlugs = [];
        foreach ($selectedSlugs as $slug) {
            if (isset($allCourses[$slug])) {
                $validSlugs[] = $slug;
            }
        }

        if (count($validSlugs) < 6) {
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
            'payment_method' => 'required|in:MTN_MoMo,Orange_Money,Bank_Transfer',
            'transaction_reference' => 'required|string|max:255',
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

        // Create enrollment for each selected course
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

        $paymentService = new PaymentService();
        $registrationFee = Setting::where('key', 'registration_fee')->value('value') ?? $paymentService->getRegistrationFee();

        $paymentService->createTransaction([
            'user_id' => $user->id,
            'type' => 'registration_fee',
            'amount' => (float) $registrationFee,
            'payment_method' => $validated['payment_method'],
            'reference' => $validated['transaction_reference'],
            'description' => 'Gold Package registration - ' . count($validSlugs) . ' courses',
            'metadata' => ['package' => 'gold', 'courses' => implode(',', $validSlugs)],
        ]);

        auth()->login($user);

        return redirect('/student')->with('success', 'Gold Package account created! Your enrollments are pending payment confirmation.');
    }
}
