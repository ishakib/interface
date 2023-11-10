<?php
return [
    'default' => \App\PaymentMethods\CashPayment::class,
    'payment_methods' => [
        'cash' => \App\PaymentMethods\CashPayment::class,
        'paypal' => \App\PaymentMethods\PaypalPayment::class,
        'stripe' => \App\PaymentMethods\StripePayment::class,
    ],
];
