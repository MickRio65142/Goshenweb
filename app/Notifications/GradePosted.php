<?php

namespace App\Notifications;

use App\Models\Grade;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class GradePosted extends Notification
{
    use Queueable;

    public function __construct(public Grade $grade, public string $type = 'created') {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        $label = $this->type === 'updated' ? 'Updated' : 'Posted';
        return [
            'title' => 'Grade ' . $label . ': ' . ($this->grade->course->title ?? 'Course'),
            'body' => 'Your grade has been ' . strtolower($label) . '. Total: ' . ($this->grade->total_mark ?? 'N/A') . ', Grade: ' . ($this->grade->grade_letter ?? '-'),
            'url' => url('/student/grades'),
        ];
    }
}
