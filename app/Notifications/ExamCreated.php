<?php

namespace App\Notifications;

use App\Models\Exam;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExamCreated extends Notification
{
    use Queueable;

    public function __construct(public Exam $exam, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Created';
        return [
            'title' => 'Exam ' . $label . ': ' . $this->exam->title,
            'body' => ($this->exam->course->title ?? 'A course') . ' — Duration: ' . $this->exam->duration_minutes . ' min, Pass score: ' . $this->exam->pass_score . '%',
            'url' => url('/student/exams'),
        ];
    }
}
