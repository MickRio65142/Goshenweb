<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExamPortalStatusChanged extends Notification
{
    use Queueable;

    public function __construct(public string $status, public string $type = 'exam') {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $portalLabel = $this->type === 'exam' ? 'Exam Portal' : 'Registration Portal';
        $isOpen = $this->status === 'open' || $this->status === 'registration_open';
        $subject = $isOpen ? $portalLabel . ' is Now Open' : $portalLabel . ' is Now Closed';

        if ($this->type === 'exam') {
            $message = $isOpen
                ? 'The exam portal has been opened. You can now take your exams.'
                : 'The exam portal has been closed. Please wait for further announcements.';
            $url = url('/student/exams');
        } else {
            $message = $isOpen
                ? 'Registration is now open. You can enroll in courses.'
                : 'Registration is currently closed.';
            $url = url('/');
        }

        return (new MailMessage)
            ->subject($subject)
            ->greeting('Hello!')
            ->line($message)
            ->action($isOpen ? 'Go Now' : 'View Dashboard', $url);
    }

    public function toArray(object $notifiable): array
    {
        $portalLabel = $this->type === 'exam' ? 'Exam Portal' : 'Registration Portal';
        $isOpen = $this->status === 'open' || $this->status === 'registration_open';
        $label = $isOpen ? 'Open' : 'Closed';

        return [
            'title' => $portalLabel . ' ' . $label,
            'body' => $isOpen
                ? ($this->type === 'exam' ? 'The exam portal is now open.' : 'Registration is now open.')
                : ($this->type === 'exam' ? 'The exam portal has been closed.' : 'Registration is now closed.'),
            'url' => $this->type === 'exam' ? url('/student/exams') : url('/'),
        ];
    }
}
