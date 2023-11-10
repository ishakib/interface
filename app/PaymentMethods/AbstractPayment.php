<?php

namespace App\PaymentMethods;

abstract class AbstractPayment implements PaymentMethodInterface
{
    abstract public function processPayment(float $amount): string;
}
