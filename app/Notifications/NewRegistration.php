<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewRegistration extends Notification
{
    use Queueable;

    public function __construct(public User $user, public string $course = '') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Student Registration')
            ->greeting('Hello Admin,')
            ->line('A new student has registered:')
            ->line('Name: ' . $this->user->name)
            ->line('Email: ' . $this->user->email)
            ->line('Course: ' . ($this->course ?: 'N/A'))
            ->action('View Student', url('/admin/users/' . $this->user->id));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Student Registration',
            'body' => $this->user->name . ' registered for ' . ($this->course ?: 'a course') . '.',
            'url' => url('/admin/users/' . $this->user->id),
        ];
    }
}
