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
}
