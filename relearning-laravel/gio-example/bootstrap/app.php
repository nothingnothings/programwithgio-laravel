<?php

use App\Http\Middleware\AssignRequestIdMiddleware;
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

        // * Use this method if you want to modify the web middlewares seen in 'getMiddlewareGroups()' in 'Middleware.php'.
        // $middleware->web(); // * arguments are arrays: prepend, append, remove, replace.

        $middleware->web(
            // append: [AssignRequestIdMiddleware::class],
            // prepend: [AssignRequestIdMiddleware::class],
            // replace: [EncryptCookies::class => YourEncryptionMiddleware::class], // replace one of the default web middlewares
            // remove: [VerifyCsrfToken::class], // remove one of the default web middlewares
        );

        // * we can use this method with the names of the groups of middlewares, or the middleware group itself. You can also use this with the default 'web' and 'api' middleware groups.
        // $middleware->appendToGroup([CheckUserRole::class, SomeOtherMiddleware::class]);
        // $middleware->prependToGroup([CheckUserRole::class, SomeOtherMiddleware::class]);



        // $middleware->use([]); // This is used if you want to disable the global middlewares.

        // $middleware->prepend(); // * THIS PREPENDS YOUR CUSTOM MIDDLEWARE TO THE BEGINNING OF THE GLOBAL MIDDLEWARE STACK.
        // $middleware->append(); // * THIS APPENDS YOUR CUSTOM MIDDLEWARE TO THE END OF THE GLOBAL MIDDLEWARE STACK.

        $middleware->prepend(App\Http\Middleware\AssignRequestIdMiddleware::class); // * THIS PREPENDS YOUR CUSTOM MIDDLEWARE TO THE BEGINNING OF THE GLOBAL MIDDLEWARE STACK.
        $middleware->append(App\Http\Middleware\AssignRequestIdMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
