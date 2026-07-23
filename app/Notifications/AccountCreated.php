<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AccountCreated extends Notification
{
    use Queueable;

    public function __construct(public User $user) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Goshen Work Skill Association')
            ->greeting('Welcome ' . $this->user->name . '!')
            ->line('Your student account has been created successfully.')
            ->line('You can now log in to access your dashboard, enroll in courses, and track your progress.')
            ->action('Go to Dashboard', url('/student'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Welcome to Goshen!',
            'body' => 'Your student account has been created. You can now log in and access your dashboard.',
            'url' => url('/student'),
        ];
    }
}
