<?php

namespace App\Notifications;

use App\Models\Enrollment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EnrollmentConfirmed extends Notification
{
    use Queueable;

    public function __construct(public Enrollment $enrollment) {}

    public function via(object $notifiable): array
    {
        return ['database'];
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
