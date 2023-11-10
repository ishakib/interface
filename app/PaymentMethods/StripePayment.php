<?php

namespace App\PaymentMethods;

use Illuminate\Support\Facades\Auth;

class StripePayment extends AbstractPayment
{
    public function processPayment(float $amount): string
    {
        $user = Auth::user();
        if (!$user) {
            return "User not authenticated. Unable to process Stripe payment.";
        }

        try {
            $user->charge($amount * 100, 'stripe');

            $transactionId = $this->generateTransactionId();

            $this->logPayment($transactionId, $amount);

            $this->updateOrderStatus();

            return "Stripe payment processed successfully. Transaction ID: $transactionId";
        } catch (\Exception $e) {

            return "Stripe payment failed. Error: " . $e->getMessage();
        }
    }

    private function generateTransactionId(): string
    {
        return uniqid('stripe_', true);
    }

    private function logPayment(string $transactionId, float $amount): void
    {
    }

    private function updateOrderStatus(): void
    {
    }
}

