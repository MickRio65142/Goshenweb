<?php

namespace App\Http\Controllers;

use App\Models\ExamAttempt;
use App\Models\ExamRegistration;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function showForm(string $token)
    {
        $attempt = ExamAttempt::where('token', $token)->with('exam')->firstOrFail();
        if (!$attempt->passed) {
            return redirect()->route('exam.result', ['slug' => $attempt->registration->course_slug, 'token' => $token]);
        }

        $registration = ExamRegistration::where('token', $token)->firstOrFail();
        if ($registration->registered) {
            return redirect('/student/login')->with('info', 'You have already registered. Please login.');
        }

        $paymentService = new PaymentService();
        $registrationFee = $paymentService->getRegistrationFee();
        $paymentInstructions = $paymentService->getPaymentInstructions();

        return view('exam.registration', compact('attempt', 'registration', 'registrationFee', 'paymentInstructions'));
    }

    public function submitRegistration(Request $request, string $token)
    {
        $registration = ExamRegistration::where('token', $token)->firstOrFail();
        if ($registration->registered) {
            return redirect('/student/login');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'payment_method' => 'required|in:MTN_MoMo,Orange_Money,Bank_Transfer',
            'transaction_reference' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone_number' => $validated['phone'],
            'role' => 'student',
        ]);

        $paymentService = new PaymentService();
        $paymentService->createTransaction([
            'user_id' => $user->id,
            'type' => 'registration_fee',
            'amount' => $paymentService->getRegistrationFee(),
            'payment_method' => $validated['payment_method'],
            'reference' => $validated['transaction_reference'],
            'description' => 'Registration fee - ' . $registration->course_slug,
            'metadata' => ['exam_attempt_id' => $registration->exam_attempt_id],
        ]);

        $registration->update([
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'registered' => true,
        ]);

        auth()->login($user);

        return redirect('/student')->with('success', 'Registration submitted! Your account will be activated once payment is confirmed.');
    }
}
