<?php

namespace App\Services;

interface PaymentGateway
{
    public function verifyTransaction(string $reference): array;
    public function getPaymentInstructions(): array;
    public function getName(): string;
}
