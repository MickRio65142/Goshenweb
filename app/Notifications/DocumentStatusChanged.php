<?php

namespace App\Notifications;

use App\Models\StudentDocument;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DocumentStatusChanged extends Notification
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
            'title' => 'Document ' . ucfirst($this->document->status),
            'body' => 'Your document "' . ($this->document->document_name ?? 'Document') . '" has been ' . $this->document->status . '.',
            'url' => url('/student/student-documents'),
        ];
    }
}
