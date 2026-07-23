<?php

namespace App\Notifications;

use App\Models\Certificate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CertificateIssued extends Notification
{
    use Queueable;

    public function __construct(public Certificate $certificate, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database'];
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
