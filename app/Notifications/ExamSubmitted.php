<?php

namespace App\Notifications;

use App\Models\ExamAttempt;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ExamSubmitted extends Notification
{
    use Queueable;

    public function __construct(public ExamAttempt $attempt) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $exam = $this->attempt->exam;
        $status = $this->attempt->passed ? 'Passed' : 'Failed';
        return (new MailMessage)
            ->subject('Exam Submitted: ' . ($exam->title ?? 'Exam'))
            ->greeting('Hello!')
            ->line($this->attempt->name . ' has submitted the exam "' . ($exam->title ?? 'Exam') . '".')
            ->line('Score: ' . $this->attempt->score . '% (' . $status . ')')
            ->action('View Results', url('/admin/exam-results'));
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
