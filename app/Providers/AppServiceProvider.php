<?php

namespace App\Providers;

use App\PaymentMethods\CashPayment;
use App\PaymentMethods\PaymentMethodInterface;
use App\PaymentMethods\PaypalPayment;
use App\PaymentMethods\StripePayment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentMethodInterface::class, function ($app) {
            // Get the desired payment method from configuration
            $paymentMethod = config('payment.default_method');

            // Return the appropriate implementation based on the configuration
            switch ($paymentMethod) {
                case 'paypal':
                    return new PaypalPayment();
                case 'stripe':
                    return new StripePayment();
                default:
                    return new CashPayment();
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
