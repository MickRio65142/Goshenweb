<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\CertificateTemplate;
use App\Notifications\CertificateIssued;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function generate(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_name' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $course = Course::findOrFail($request->course_id);

        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('status', 'active')
            ->first();

        if (!$enrollment) {
            return back()->with('error', 'You are not enrolled in this course.');
        }

        $existing = Certificate::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->whereIn('status', ['available', 'issued'])
            ->first();

        if ($existing) {
            return back()->with('error', 'A certificate for this course already exists.');
        }

        $template = $course->certificateTemplate;
        if (!$template || $template->status !== 'active') {
            return back()->with('error', 'No certificate template is configured for this course.');
        }

        $certNumber = 'GOS-' . date('Y') . '-' . strtoupper(Str::random(6));

        $config = $template->config;
        $fields = $config['fields'] ?? [];

        $fieldValues = [];
        foreach ($fields as $field) {
            $value = match ($field['placeholder']) {
                '[NAME]' => $request->student_name,
                '[COURSE]' => $course->title ?? $course->name,
                '[DATE]' => now()->format('F d, Y'),
                '[NUMBER]' => $certNumber,
                default => $field['placeholder'],
            };
            $fieldValues[] = array_merge($field, ['value' => $value]);
        }

        $orientation = $template->orientation === 'portrait' ? 'portrait' : 'landscape';
        $pageWidth = $config['page_width'] ?? 1200;
        $pageHeight = $config['page_height'] ?? 800;

        $backgroundUrl = public_path('storage/' . $template->background_file);

        $pdf = Pdf::loadView('pdf.certificate', [
            'fields' => $fieldValues,
            'backgroundUrl' => $backgroundUrl,
            'pageWidth' => $pageWidth,
            'pageHeight' => $pageHeight,
            'orientation' => $orientation,
        ]);

        $pdf->setPaper($orientation === 'landscape' ? 'a4' : [0, 0, $pageWidth, $pageHeight], $orientation);
        $pdf->setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);

        $filename = 'certificates/' . $certNumber . '.pdf';
        Storage::disk('public')->put($filename, $pdf->output());

        $certificate = Certificate::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'certificate_number' => $certNumber,
            'issue_date' => now(),
            'file_path' => $filename,
            'status' => 'available',
        ]);

        $user->notify(new CertificateIssued($certificate, 'created'));

        return redirect('/student/certificates')->with('success', 'Certificate generated successfully!');
    }
}
