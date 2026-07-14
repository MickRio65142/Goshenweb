<?php

namespace App\Notifications;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AnnouncementCreated extends Notification
{
    use Queueable;

    public function __construct(public Announcement $announcement) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Announcement: ' . $this->announcement->title,
            'body' => \Illuminate\Support\Str::limit($this->announcement->content, 120),
            'url' => url('/student/announcements'),
        ];
    }
}
