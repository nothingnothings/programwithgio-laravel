<?php

declare(strict_types=1);

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::prefix('/transactions')->group(function () {
    Route::controller(TransactionController::class)->group(
        Route::name('transactions.')->group(
            function () {
                Route::get('/',  'index')->name('home');
                Route::get('/{transactionId:[0-9]+}', 'show')->name('show');
                Route::get('/create', 'create')->name('create');
                Route::post('/',  'store')->name('store');
                Route::put('/{transaction}',  'update')->name('update');
                Route::delete('/{transaction}',  'destroy')->name('destroy');
            }
        )
    );
});
