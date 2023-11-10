<?php

namespace App\Http\Services;
use App\Exceptions\PaymentMethodException;

class PaymentMethodResolver
{

    public function resolveFromRequest($request)
    {
        $paymentMethodConfig = config("payment.payment_methods.{$request->input('payment_method')}", 'payment.default');

        try {
            return app($paymentMethodConfig);
        } catch (\Exception $e) {
            throw new PaymentMethodException("Error resolving payment method: {$e->getMessage()}", $e->getCode(), $e);
        }
    }
}
