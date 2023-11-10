<?php

namespace App\PaymentMethods;

class StripePayment implements PaymentMethodInterface
{
    public function processPayment()
    {
        return "Stripe payment done";
    }
}
