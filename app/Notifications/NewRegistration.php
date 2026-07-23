<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewRegistration extends Notification
{
    use Queueable;

    public function __construct(public User $user, public string $course = '') {}

    public function via(object $notifiable): array
    {
        return ['database'];
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
