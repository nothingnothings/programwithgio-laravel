<?php

namespace App\Providers;

use App\Contracts\PaymentProcessorInterface;
use App\Services\Stripe;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // * Same thing as setting the binding in register, but with a shorthand:
    // public $bindings = [
    //     PaymentProcessorInterface::class => \App\Services\Stripe::class,
    // ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        // * HERE WE CAN SET UP CUSTOM CONTAINER BINDINGS, AND USE THEM IN THE CONTROLLERS.
        // $this->app->bind('App\Contracts\PaymentProcessorInterface', function () {
        //     return new \App\Services\Stripe(
        //         [
        //             'dummy_key' => 'dummy_value',
        //         ],
        //         new \App\Services\SalesTaxCalculator()
        //     );
        // });

        // $this->app->bind('App\Contracts\PaymentProcessorInterface', function (Application $app) {
        //     return new \App\Services\Stripe(
        //         [
        //             'dummy_key' => 'dummy_value',
        //         ],
        //         $app->make('App\Services\SalesTaxCalculator')
        //     );
        // });

        // * Best way, because our class and all its dependencies are resolved, considering that parameters are passed down with the assoc array.
        $this->app->bind('App\Contracts\PaymentProcessorInterface', function (Application $app) {
            return $app->make(Stripe::class, [
                'config' => [
                    'dummy_key' => 'dummy_value',
                ]
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Route::pattern('transactionId', '[0-9]+'); // this is a constraint applied to all routes that have a parameter named 'id'
        Route::pattern('fileId', '[0-9]+'); // this is a constraint applied to all routes that have a parameter named 'id'


        View::share('title', 'MY LARAVEL APP'); // with this call, we share this data with all the views of our app (this key, 'name', of value 'MY LARAVEL APP').
    }
}
