<?php

namespace App\Notifications;

use App\Models\ExamAttempt;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExamSubmitted extends Notification
{
    use Queueable;

    public function __construct(public ExamAttempt $attempt) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $exam = $this->attempt->exam;
        return [
            'title' => 'Exam Submitted: ' . ($exam->title ?? 'Exam'),
            'body' => $this->attempt->name . ' scored ' . $this->attempt->score . '% (' . ($this->attempt->passed ? 'Passed' : 'Failed') . ')',
            'url' => url('/admin/exam-results'),
        ];
    }
}
