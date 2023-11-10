<?php

namespace App\PaymentMethods;

interface PaymentMethodInterface {
    public function processPayment(float $amount): string;
}
