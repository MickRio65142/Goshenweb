<?php

namespace App\Notifications;

use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AnnouncementCreated extends Notification
{
    use Queueable;

    public function __construct(public Announcement $announcement) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Announcement: ' . $this->announcement->title)
            ->greeting('Hello!')
            ->line('A new announcement has been posted:')
            ->line($this->announcement->title)
            ->line(\Illuminate\Support\Str::limit(strip_tags($this->announcement->content), 300))
            ->action('View Announcement', url('/student/announcements'));
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
