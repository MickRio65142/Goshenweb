<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamQuestion;
use App\Models\ExamRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExamController extends Controller
{
    public function show(string $slug)
    {
        $course = $this->getCourseData($slug);
        if (!$course) abort(404);

        $exam = Exam::where('course_slug', $slug)
            ->where('is_active', true)
            ->first();

        if (!$exam) {
            $exam = Exam::whereNull('course_slug')
                ->where('is_active', true)
                ->first();
        }

        if (!$exam) {
            $exam = $this->createDefaultExam($course, $slug);
        }

        return view('exam.show', compact('exam', 'course'));
    }

    public function start(Request $request, string $slug)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $exam = Exam::findOrFail($request->exam_id);
        $course = $this->getCourseData($slug);
        if (!$course) abort(404);

        $attemptsCount = ExamAttempt::where('email', $validated['email'])
            ->where('exam_id', $exam->id)
            ->count();

        if ($attemptsCount >= $exam->max_attempts) {
            return back()->withErrors(['email' => 'Maximum attempts reached for this exam.']);
        }

        $token = Str::random(64);
        $attempt = ExamAttempt::create([
            'exam_id' => $exam->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'attempt_number' => $attemptsCount + 1,
            'token' => $token,
            'started_at' => now(),
        ]);

        $questions = $exam->shuffle_questions
            ? $exam->questions()->inRandomOrder()->get()
            : $exam->questions;

        session(["exam_{$attempt->id}_questions" => $questions->pluck('id')->toArray()]);

        return redirect()->route('exam.take', [
            'slug' => $slug,
            'token' => $token,
        ]);
    }

    public function take(string $slug, string $token)
    {
        $attempt = ExamAttempt::where('token', $token)->firstOrFail();
        if ($attempt->completed_at) {
            return redirect()->route('exam.result', ['slug' => $slug, 'token' => $token]);
        }

        $exam = $attempt->exam;
        $course = $this->getCourseData($slug);
        $questions = $exam->shuffle_questions
            ? ExamQuestion::whereIn('id', session("exam_{$attempt->id}_questions", []))
                ->get()->shuffle()
            : $exam->questions;

        $timeRemaining = $exam->duration_minutes * 60 - now()->diffInSeconds($attempt->started_at);
        if ($timeRemaining <= 0) {
            return $this->autoSubmit($attempt, $exam, $slug);
        }

        return view('exam.take', compact('exam', 'attempt', 'course', 'questions', 'timeRemaining'));
    }

    public function submit(Request $request, string $slug, string $token)
    {
        $attempt = ExamAttempt::where('token', $token)->firstOrFail();
        if ($attempt->completed_at) {
            return redirect()->route('exam.result', ['slug' => $slug, 'token' => $token]);
        }

        $exam = $attempt->exam;
        $questions = $exam->questions;
        $total = $questions->count();
        $correct = 0;

        foreach ($questions as $question) {
            $answer = $request->input("question_{$question->id}");
            if ($answer === $question->correct_option) {
                $correct++;
            }
        }

        $score = $total > 0 ? ($correct / $total) * 100 : 0;
        $passed = $score >= $exam->pass_score;

        $attempt->update([
            'score' => $score,
            'total_questions' => $total,
            'correct_answers' => $correct,
            'passed' => $passed,
            'completed_at' => now(),
        ]);

        if ($passed) {
            ExamRegistration::create([
                'exam_attempt_id' => $attempt->id,
                'name' => $attempt->name,
                'email' => $attempt->email,
                'course_slug' => $slug,
                'token' => $attempt->token,
            ]);
        }

        return redirect()->route('exam.result', ['slug' => $slug, 'token' => $token]);
    }

    public function result(string $slug, string $token)
    {
        $attempt = ExamAttempt::where('token', $token)->firstOrFail();
        $exam = $attempt->exam;
        $course = $this->getCourseData($slug);

        return view('exam.result', compact('attempt', 'exam', 'course'));
    }

    private function autoSubmit(ExamAttempt $attempt, Exam $exam, string $slug)
    {
        $questions = $exam->questions;
        $attempt->update([
            'score' => 0,
            'total_questions' => $questions->count(),
            'correct_answers' => 0,
            'passed' => false,
            'completed_at' => now(),
        ]);

        return redirect()->route('exam.result', ['slug' => $slug, 'token' => $attempt->token]);
    }

    private function getCourseData(string $slug): ?array
    {
        $controller = new CourseController();
        $courses = $controller->getCourses();
        $course = $courses[$slug] ?? null;
        if ($course) {
            $course['slug'] = $slug;
        }
        return $course;
    }

    private function createDefaultExam(array $course, string $slug): Exam
    {
        return Exam::create([
            'title' => $course['title'] . ' - Pre-Registration Exam',
            'description' => 'Sample exam for ' . $course['title'],
            'course_slug' => $slug,
            'duration_minutes' => 30,
            'pass_score' => 50,
            'max_attempts' => 3,
            'shuffle_questions' => true,
            'is_active' => true,
        ]);
    }
}
