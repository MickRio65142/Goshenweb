<?php

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseCreated extends Notification
{
    use Queueable;

    public function __construct(public Course $course) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $name = $this->course->title ?: $this->course->name;
        return (new MailMessage)
            ->subject('New Course Available: ' . $name)
            ->greeting('Hello!')
            ->line('A new course has been added:')
            ->line($name)
            ->action('View Course', url('/student/enrollments'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Course Available: ' . ($this->course->title ?: $this->course->name),
            'body' => 'A new course has been added — "' . ($this->course->title ?: $this->course->name) . '". Check it out now!',
            'url' => url('/student/enrollments'),
        ];
    }
}
