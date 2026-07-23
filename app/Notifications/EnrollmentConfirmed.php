<?php

namespace App\Notifications;

use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EnrollmentConfirmed extends Notification
{
    use Queueable;

    public function __construct(public Enrollment $enrollment) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $status = ucfirst($this->enrollment->status);
        $courseName = $this->enrollment->course->title ?? 'Course';
        return (new MailMessage)
            ->subject('Enrollment ' . $status)
            ->greeting('Hello!')
            ->line('Your enrollment in "' . $courseName . '" has been ' . $this->enrollment->status . '.')
            ->action('View Enrollments', url('/student/enrollments'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Enrollment ' . ucfirst($this->enrollment->status),
            'body' => 'Your enrollment in "' . ($this->enrollment->course->title ?? 'Course') . '" is ' . $this->enrollment->status . '.',
            'url' => url('/student/enrollments'),
        ];
    }
}
