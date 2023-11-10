<?php

namespace App\PaymentMethods;

class CashPayment extends AbstractPayment
{
    public function processPayment(float $amount): string
    {
        $transactionId = $this->generateTransactionId();

        $this->storePaymentInDatabase($transactionId, $amount);

        $this->logPayment($transactionId, $amount);

        $this->updateOrderStatus();

        return "Cash payment processed successfully. Transaction ID: $transactionId";
    }

    private function generateTransactionId(): string
    {
        return uniqid('cash_', true);
    }

    private function storePaymentInDatabase(string $transactionId, float $amount): void
    {
    }

    private function logPayment(string $transactionId, float $amount): void
    {
    }

    private function updateOrderStatus(): void
    {
    }
}
