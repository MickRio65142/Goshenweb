<?php

namespace App\Notifications;

use App\Models\StudentDocument;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DocumentUploaded extends Notification
{
    use Queueable;

    public function __construct(public StudentDocument $document) {}

    public function via(object $notifiable): array
    {
        return ['database'];
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
