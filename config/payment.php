<?php

return [
    'gateway' => env('PAYMENT_GATEWAY', 'manual'),

    'manual' => [
        'momo_number' => env('MOMO_NUMBER', '679202265'),
        'orange_number' => env('ORANGE_NUMBER', '679202265'),
        'bank_name' => env('BANK_NAME', 'Afriland First Bank'),
        'bank_account' => env('BANK_ACCOUNT', '12345678901'),
    ],

    'paystack' => [
        'public_key' => env('PAYSTACK_PUBLIC_KEY', ''),
        'secret_key' => env('PAYSTACK_SECRET_KEY', ''),
        'merchant_email' => env('PAYSTACK_MERCHANT_EMAIL', ''),
    ],

    'registration_fee' => env('REGISTRATION_FEE', 25000),
    'currency' => env('PAYMENT_CURRENCY', 'XAF'),
];
