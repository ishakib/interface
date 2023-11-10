<?php

namespace App\PaymentMethods;

interface PaymentMethodInterface
{

    public function processPayment();
}
