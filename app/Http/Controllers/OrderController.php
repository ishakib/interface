<?php

namespace App\Http\Controllers;


use App\Http\Services\PaymentMethodResolver;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $paymentMethodResolver;

    public function __construct(PaymentMethodResolver $paymentMethodResolver)
    {
        $this->paymentMethodResolver = $paymentMethodResolver;
    }

    public function storeOrder(Request $request)
    {
        $paymentMethod = $this->paymentMethodResolver->resolveFromRequest($request);

        $amount = $request->input('amount');
        return $paymentMethod->processPayment($amount);
    }
}
