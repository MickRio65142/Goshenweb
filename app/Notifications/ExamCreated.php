<?php

namespace App\Notifications;

use App\Models\Exam;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ExamCreated extends Notification
{
    use Queueable;

    public function __construct(public Exam $exam, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Created';
        return (new MailMessage)
            ->subject('Exam ' . $label . ': ' . $this->exam->title)
            ->greeting('Hello!')
            ->line('An exam has been ' . $this->type . ' for ' . ($this->exam->course->title ?? 'your course') . '.')
            ->line('Title: ' . $this->exam->title)
            ->line('Duration: ' . $this->exam->duration_minutes . ' minutes')
            ->line('Pass Score: ' . $this->exam->pass_score . '%')
            ->action('View Exam', url('/student/exams'));
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
