<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Route::pattern('transactionId', '[0-9]+'); // this is a constraint applied to all routes that have a parameter named 'id'
        Route::pattern('fileId', '[0-9]+'); // this is a constraint applied to all routes that have a parameter named 'id'
    }
}
