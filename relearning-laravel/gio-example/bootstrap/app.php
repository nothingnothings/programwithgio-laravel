<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        // * THIS IS HOW WE CAN ADD ADDITIONAL ROUTES, WITHOUT CLOGGING 'web.php':
        // then: function () {
        //     Route::prefix('transactions')
        //         ->name('transactions.')
        //         ->group(base_path('routes/transactions.php'));
        // }
    )
    ->withMiddleware(function (Middleware $middleware) {

        // $middleware->use([]); // This is used if you want to disable the global middlewares.

        // $middleware->prepend(); // * THIS PREPENDS YOUR CUSTOM MIDDLEWARE TO THE BEGINNING OF THE GLOBAL MIDDLEWARE STACK.
        // $middleware->append(); // * THIS APPENDS YOUR CUSTOM MIDDLEWARE TO THE END OF THE GLOBAL MIDDLEWARE STACK.

        $middleware->prepend(App\Http\Middleware\AssignRequestIdMiddleware::class); // * THIS PREPENDS YOUR CUSTOM MIDDLEWARE TO THE BEGINNING OF THE GLOBAL MIDDLEWARE STACK.
        $middleware->append(App\Http\Middleware\AssignRequestIdMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
