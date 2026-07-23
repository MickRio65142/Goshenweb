<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class TransactionRecorded extends Notification
{
    use Queueable;

    public function __construct(public Transaction $transaction) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $status = ucfirst($this->transaction->status);
        $amount = number_format($this->transaction->amount, 0, ',', ' ') . ' ' . ($this->transaction->currency ?? 'XAF');
        return (new MailMessage)
            ->subject('Payment ' . $status)
            ->greeting('Hello!')
            ->line('A payment has been recorded:')
            ->line('Amount: ' . $amount)
            ->line('Status: ' . $status)
            ->line('Description: ' . ($this->transaction->description ?? $this->transaction->type))
            ->action('View Transactions', url('/student/transactions'));
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Payment ' . ucfirst($this->transaction->status),
            'body' => number_format($this->transaction->amount, 0, ',', ' ') . ' ' . ($this->transaction->currency ?? 'XAF') . ' — ' . ($this->transaction->description ?? $this->transaction->type),
            'url' => url('/student/transactions'),
        ];
    }
}
