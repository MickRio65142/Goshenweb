<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
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
        return match ($campus) {
            'douala' => 'Douala Main Campus',
            'limbe' => 'Limbe Campus',
            default => 'General Enquiry',
        };
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'campus' => 'required|in:general,douala,limbe',
            'start_date' => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            Mail::raw(
                "Contact Form Enquiry\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Course/Package: {$validated['course']}\n" .
                "Start Date: {$validated['start_date']}\n" .
                "Message: {$validated['message']}",
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('Contact Enquiry - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Contact form email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send message. Please try again.');
        }

        return back()->with('success', 'Thank you! Your enquiry has been sent successfully.');
    }

    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255',
            'campus' => 'required|in:general,douala,limbe',
            'start_date' => 'required|string|max:20',
            'message' => 'nullable|string|max:2000',
        ]);

        $toEmail = $this->getCampusEmail($validated['campus']);
        $campusLabel = $this->getCampusLabel($validated['campus']);

        try {
            Mail::raw(
                "Course Enquiry\n\n" .
                "Name: {$validated['name']}\n" .
                "Email: {$validated['email']}\n" .
                "Phone: {$validated['phone']}\n" .
                "Campus: {$campusLabel}\n" .
                "Course: {$validated['course']}\n" .
                "Start Date: {$validated['start_date']}\n" .
                "Message: " . ($validated['message'] ?? 'N/A'),
                function ($message) use ($validated, $toEmail) {
                    $message->to($toEmail)
                            ->subject('Course Enquiry - ' . $validated['name'])
                            ->from('Info@goshenworkskill.com', 'Goshen Work Skill Association')
                            ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Exception $e) {
            Log::error('Enquiry email failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send enquiry. Please try again.');
        }

        return back()->with('success', 'Thank you! Your enquiry has been sent successfully.');
    }
}
