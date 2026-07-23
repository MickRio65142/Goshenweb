<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class EventCreated extends Notification
{
    use Queueable;

    public function __construct(public Event $event) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Event: ' . $this->event->title)
            ->greeting('Hello!')
            ->line('A new event has been scheduled:')
            ->line($this->event->title)
            ->line('Type: ' . ucfirst($this->event->event_type))
            ->line('Date: ' . $this->event->event_date->format('M d, Y g:i A'))
            ->action('View Events', url('/student/events'));
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
