<?php

namespace App\Notifications;

use App\Models\StudentDocument;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DocumentStatusChanged extends Notification
{
    use Queueable;

    public function __construct(public StudentDocument $document) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $status = ucfirst($this->document->status);
        $docName = $this->document->document_name ?? 'Document';
        return (new MailMessage)
            ->subject('Document ' . $status)
            ->greeting('Hello!')
            ->line('Your document "' . $docName . '" has been ' . $this->document->status . '.')
            ->action('View Documents', url('/student/student-documents'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Document ' . ucfirst($this->document->status),
            'body' => 'Your document "' . ($this->document->document_name ?? 'Document') . '" has been ' . $this->document->status . '.',
            'url' => url('/student/student-documents'),
        ];
    }
}
