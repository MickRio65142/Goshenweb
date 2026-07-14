<?php

namespace App\Notifications;

use App\Models\LiveClass;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LiveClassScheduled extends Notification
{
    use Queueable;

    public function __construct(public LiveClass $liveClass) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Live Class Scheduled',
            'body' => ($this->liveClass->course->title ?? 'Course') . ' | ' . $this->liveClass->scheduled_at->format('M d, Y g:i A') . ' | ' . $this->liveClass->platform,
            'url' => $this->liveClass->join_url ?? url('/student/live-classes'),
        ];
    }
}
