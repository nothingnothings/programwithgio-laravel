<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class PaymentProcessorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->bind('App\Contracts\PaymentProcessorInterface', function () {
            return new \App\Services\Stripe(
                [
                    'dummy_key' => 'dummy_value',
                ],
                new \App\Services\SalesTaxCalculator()
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
