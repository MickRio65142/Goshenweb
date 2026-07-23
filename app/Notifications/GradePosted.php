<?php

namespace App\Notifications;

use App\Models\Grade;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class GradePosted extends Notification
{
    use Queueable;

    public function __construct(public Grade $grade, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Posted';
        return (new MailMessage)
            ->subject('Grade ' . $label . ': ' . ($this->grade->course->title ?? 'Course'))
            ->greeting('Hello!')
            ->line('Your grade has been ' . strtolower($label) . ' for ' . ($this->grade->course->title ?? 'your course') . '.')
            ->line('Total Marks: ' . ($this->grade->total_mark ?? 'N/A'))
            ->line('Grade: ' . ($this->grade->grade_letter ?? '-'))
            ->action('View Grades', url('/student/grades'));
    }

    public function toArray(object $notifiable): array
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Posted';
        return [
            'title' => 'Grade ' . $label . ': ' . ($this->grade->course->title ?? 'Course'),
            'body' => 'Your grade has been ' . strtolower($label) . '. Total: ' . ($this->grade->total_mark ?? 'N/A') . ', Grade: ' . ($this->grade->grade_letter ?? '-'),
            'url' => url('/student/grades'),
        ];
    }
}
