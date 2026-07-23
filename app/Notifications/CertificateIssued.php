<?php

namespace App\Notifications;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CertificateIssued extends Notification
{
    use Queueable;

    public function __construct(public Certificate $certificate, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Issued';
        $action = $this->type === 'updated' ? 'updated' : 'issued';
        return (new MailMessage)
            ->subject('Certificate ' . $label)
            ->greeting('Hello!')
            ->line('Your certificate has been ' . $action . ' and is now available in your dashboard.')
            ->line('Course: ' . ($this->certificate->course->title ?? 'N/A'))
            ->action('View Certificate', url('/student/certificates'));
    }

    public function toArray(object $notifiable): array
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Issued';
        return [
            'title' => 'Certificate ' . $label,
            'body' => $this->type === 'updated'
                ? 'Your certificate has been updated.'
                : 'A new certificate has been issued and is now available.',
            'url' => url('/student/certificates'),
        ];
    }
}
