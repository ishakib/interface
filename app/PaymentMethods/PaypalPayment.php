<?php

namespace App\PaymentMethods;


class PaypalPayment extends AbstractPayment
{
    public function processPayment(float $amount): string
    {
        return "Paypal transection done";
    }
}
