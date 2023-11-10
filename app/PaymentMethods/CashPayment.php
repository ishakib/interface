<?php

namespace App\PaymentMethods;

class CashPayment implements PaymentMethodInterface
{
    public function processPayment()
    {
        return "Cash payment done";
    }

}
