<?php

namespace App\Providers;

use App\PaymentMethods\PaymentMethodInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->registerPaymentMethods();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected function registerPaymentMethods(): void
    {
        $defaultMethod = config('payment.default_method');
        $methods = config('payment.methods', []);

        $this->app->bind(PaymentMethodInterface::class, function ($app) use ($defaultMethod, $methods) {
            $selectedMethod = $methods[$defaultMethod] ?? $methods['cash'];

            return $app->make($selectedMethod);
        });
    }
}
