<?php

namespace App\Http\Services;
use App\Exceptions\PaymentMethodException;
use Illuminate\Support\Facades\Config;
class PaymentMethodResolver
{

    public function resolveFromRequest($request)
    {
        $paymentMethod = $request->input('payment_method');
        $defaultPaymentMethod = Config::get('payment.default');
        $paymentMethodClass = Config::get("payment.payment_methods.$paymentMethod", $defaultPaymentMethod);

        if (!class_exists($paymentMethodClass)) {
            throw new PaymentMethodException("Invalid payment method: $paymentMethodClass");
        }

        return app($paymentMethodClass);
    }
}
