<?php

namespace App\Notifications;

use App\Models\StudentDocument;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DocumentUploaded extends Notification
{
    use Queueable;

    public function __construct(public StudentDocument $document) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $studentName = $this->document->user->name ?? 'A student';
        $docName = $this->document->document_name ?? 'a document';
        return (new MailMessage)
            ->subject('New Document Uploaded')
            ->greeting('Hello!')
            ->line($studentName . ' has uploaded a new document: "' . $docName . '".')
            ->action('Review Document', url('/admin/student-documents/' . $this->document->id . '/edit'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'New Document Uploaded',
            'body' => ($this->document->user->name ?? 'A student') . ' uploaded "' . ($this->document->document_name ?? 'a document') . '". Review it now.',
            'url' => url('/admin/student-documents/' . $this->document->id . '/edit'),
        ];
    }
}
