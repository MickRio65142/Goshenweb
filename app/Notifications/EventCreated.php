<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class EventCreated extends Notification
{
    use Queueable;

    public function __construct(public Event $event) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Event: ' . $this->event->title,
            'body' => 'Type: ' . ucfirst($this->event->event_type) . ' | Date: ' . $this->event->event_date->format('M d, Y g:i A'),
            'url' => url('/student/events'),
        ];
    }
}
