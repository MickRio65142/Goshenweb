<?php

namespace App\Services;

class ManualMomoGateway implements PaymentGateway
{
    public function verifyTransaction(string $reference): array
    {
        return [
            'verified' => false,
            'message' => 'Manual verification required. Admin will confirm payment.',
        ];
    }

    public function getPaymentInstructions(): array
    {
        return [
            'MTN MoMo' => 'Send to: ' . config('payment.manual.momo_number'),
            'Orange Money' => 'Send to: ' . config('payment.manual.orange_number'),
            'Bank Transfer' => config('payment.manual.bank_name') . ' - Acct: ' . config('payment.manual.bank_account'),
            'Credit/Debit Card' => 'Available via Paystack (coming soon)',
        ];
    }

    public function getName(): string
    {
        return 'Manual Confirmation';
    }
}
