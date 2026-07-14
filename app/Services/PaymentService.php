<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Str;

class PaymentService
{
    private PaymentGateway $gateway;

    public function __construct()
    {
        $driver = config('payment.gateway', 'manual');
        $this->gateway = match ($driver) {
            default => new ManualMomoGateway(),
        };
    }

    public function getGateway(): PaymentGateway
    {
        return $this->gateway;
    }

    public function createTransaction(array $data): Transaction
    {
        return Transaction::create([
            'user_id' => $data['user_id'] ?? null,
            'reference' => $data['reference'] ?? 'TXN-' . strtoupper(Str::random(12)),
            'type' => $data['type'],
            'amount' => $data['amount'],
            'currency' => $data['currency'] ?? config('payment.currency', 'XAF'),
            'payment_method' => $data['payment_method'],
            'status' => 'pending',
            'description' => $data['description'] ?? '',
            'metadata' => $data['metadata'] ?? [],
        ]);
    }

    public function getRegistrationFee(): float
    {
        return (float) config('payment.registration_fee', 25000);
    }

    public function getPaymentInstructions(): array
    {
        return $this->gateway->getPaymentInstructions();
    }
}
