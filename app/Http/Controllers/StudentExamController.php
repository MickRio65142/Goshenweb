<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\ExamQuestion;
use App\Models\Enrollment;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class StudentExamController extends Controller
{
    public function start(Exam $exam)
    {
        $exam->loadCount('questions');

        if (Setting::where('key', 'exam_portal_open')->value('value') !== 'true') {
            return redirect()->back()->with('error', 'The exam portal is currently closed.');
        }

        if (!$exam->is_active) {
            return redirect()->back()->with('error', 'This exam is not currently available.');
        }

        $enrolled = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $exam->course_id)
            ->whereIn('status', ['active', 'completed'])
            ->exists();

        if (!$enrolled) {
            return redirect()->back()->with('error', 'You are not enrolled in the course for this exam.');
        }

        $attemptsCount = ExamAttempt::where('user_id', Auth::id())
            ->where('exam_id', $exam->id)
            ->count();

        if ($attemptsCount >= $exam->max_attempts) {
            return redirect()->back()->with('error', 'You have reached the maximum number of attempts for this exam.');
        }

        $attempt = ExamAttempt::create([
            'exam_id' => $exam->id,
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'attempt_number' => $attemptsCount + 1,
            'started_at' => now(),
        ]);

        return redirect()->route('student.exam.take', ['attempt' => $attempt->id]);
    }

    public function take(ExamAttempt $attempt)
    {
        $attempt->load('exam');

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        if ($attempt->completed_at) {
            return redirect()->route('student.exam.result', ['attempt' => $attempt->id]);
        }

        $exam = $attempt->exam;

        if ($exam->time_per_question_seconds) {
            $totalBackupSeconds = $exam->time_per_question_seconds * max($exam->questions()->count(), 1);
            $elapsed = now()->diffInSeconds($attempt->started_at);
            if ($elapsed >= $totalBackupSeconds) {
                return $this->autoSubmit($attempt);
            }
            $timeRemaining = $totalBackupSeconds - $elapsed;
        } else {
            $timeRemaining = $exam->duration_minutes * 60 - now()->diffInSeconds($attempt->started_at);
            if ($timeRemaining <= 0) {
                return $this->autoSubmit($attempt);
            }
        }

        $questions = $exam->shuffle_questions
            ? $exam->questions()->inRandomOrder()->get()
            : $exam->questions;

        return view('filament.student.exam.take', compact('exam', 'attempt', 'questions', 'timeRemaining'));
    }

    public function submit(Request $request, ExamAttempt $attempt)
    {
        $attempt->load('exam');

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        if ($attempt->completed_at) {
            return redirect()->route('student.exam.result', ['attempt' => $attempt->id]);
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

        $score = $total > 0 ? round(($correct / $total) * 100, 1) : 0;
        $passed = $score >= $exam->pass_score;

        $attempt->update([
            'score' => $score,
            'total_questions' => $total,
            'correct_answers' => $correct,
            'passed' => $passed,
            'completed_at' => now(),
        ]);

        $admins = \App\Models\User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\ExamSubmitted($attempt));

        auth()->user()->notify(new \App\Notifications\ExamSubmitted($attempt));

        return redirect()->route('student.exam.result', ['attempt' => $attempt->id]);
    }

    public function result(ExamAttempt $attempt)
    {
        $attempt->load('exam');

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $exam = $attempt->exam;

        return view('filament.student.exam.result', compact('attempt', 'exam'));
    }

    private function autoSubmit($attempt)
    {
        $exam = $attempt->exam;
        $questions = $exam->questions;

        $attempt->update([
            'score' => 0,
            'total_questions' => $questions->count(),
            'correct_answers' => 0,
            'passed' => false,
            'completed_at' => now(),
        ]);

        $admins = \App\Models\User::where('role', 'admin')->get();
        Notification::send($admins, new \App\Notifications\ExamSubmitted($attempt));

        auth()->user()->notify(new \App\Notifications\ExamSubmitted($attempt));

        return redirect()->route('student.exam.result', ['attempt' => $attempt->id]);
    }
}
