<?php

namespace App\Notifications;

use App\Models\LiveClass;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class LiveClassScheduled extends Notification
{
    use Queueable;

    public function __construct(public LiveClass $liveClass, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Scheduled';
        return (new MailMessage)
            ->subject('Live Class ' . $label)
            ->greeting('Hello!')
            ->line('A live class has been ' . ($this->type === 'updated' ? 'rescheduled' : 'scheduled') . '.')
            ->line('Course: ' . ($this->liveClass->course->title ?? 'Course'))
            ->line('Date & Time: ' . $this->liveClass->scheduled_at->format('M d, Y g:i A'))
            ->line('Platform: ' . $this->liveClass->platform)
            ->action('Join Class', $this->liveClass->join_url ?? url('/student/live-classes'));
    }

    public function toArray(object $notifiable): array
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Scheduled';
        return [
            'title' => 'Live Class ' . $label,
            'body' => ($this->liveClass->course->title ?? 'Course') . ' | ' . $this->liveClass->scheduled_at->format('M d, Y g:i A') . ' | ' . $this->liveClass->platform,
            'url' => $this->liveClass->join_url ?? url('/student/live-classes'),
        ];
    }
}
