<?php

namespace App\Notifications;

use App\Models\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CourseUpdated extends Notification
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
            ->subject('Course Updated: ' . $name)
            ->greeting('Hello!')
            ->line('The course "' . $name . '" has been updated with new content.')
            ->action('View Course', url('/student/enrollments'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Course Updated: ' . ($this->course->title ?: $this->course->name),
            'body' => 'New content has been added to "' . ($this->course->title ?: $this->course->name) . '". Check it out now!',
            'url' => url('/student/enrollments'),
        ];
    }
}
