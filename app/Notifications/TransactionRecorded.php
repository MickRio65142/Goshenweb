<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TransactionRecorded extends Notification
{
    use Queueable;

    public function __construct(public Transaction $transaction) {}

    public function via(object $notifiable): array
    {
        return ['database'];
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
