<?php

declare(strict_types=1);

use App\Enums\FileType;
use App\Http\Controllers\ProcessTransactionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return 'Welcome to the dashboard';
});

Route::get('/users', function () {
    return ['John', 'Mary', 'Peter'];
});

Route::get('/transactions/{transactionId}', function ($transactionId) {
    return "Transaction $transactionId";
});

Route::get('/transactions/{parameter1}/{parameter2}', function ($parameter1, $parameter2) {
    return "Transaction $parameter1 $parameter2";
});

// with this, we can leave 'month' as an OPTIONAL PARAMETER. The only needed thing is the passing of a default parameter value (like 'null', in this case)
Route::get('/report/{year}/{month?}', function ($year, $month = null) {
    return "Report $year $month";
});


// Example of how to get the REQUEST PARAMETERS from the Request object (without helper function 'request()')
Route::get('/report/{year}/{month?}', function (Request $request, int $year, int $month = null) {

    $year = $request->get('year');
    $month = $request->get('month');

    return "Report $year $month";
});


// we get the id from the url, and the request parameters from the query string (?year=2020&month=12)
Route::get('/report/{reportId}', function (Request $request, int $reportId) {

    $year = $request->get('year');
    $month = $request->get('month');

    return "generting report $reportId";
});


// Using regular expressions as constraints, in our routes, to make sure that only ints are passed as route parameters:
Route::get('/report/{reportId:[0-9]+}', function (Request $request, int $reportId) {
    return "generting report $reportId";
});



// Same thing as the route above, but with more explicit 'where()' function.
Route::get('/report/{reportId}', function (Request $request, int $reportId) {
    return "generating report $reportId";
})->where('transactionId', '[0-9]+');


// We can also CHAIN where clauses, with multiple parts of the url being targeted by the regular expressions.
Route::get('/report/{reportId}', function (Request $request, int $reportId) {
    return "generting report $reportId";
})->where('transactionId', '[0-9]+')->where('year', '[0-9]+');


// Same thing as the route above, but with a shorter where syntax.
Route::get('/report/{reportId}', function (Request $request, int $reportId) {
    return "generting report $reportId";
})->where(
    (['transactionId' => '[0-9]+', 'year' => '[0-9]+'])
);

// Same thing as the route above, but with 'whereNumber' instead of 'where':
Route::get('/report/{reportId}', function (Request $request, int $reportId) {
    return "generting report $reportId";
})->whereNumber('transactionId', '[0-9]+')->whereNumber('year', '[0-9]+');


// 'whereIn()' selects against a list of acceptable values:
Route::get('/files/{fileType}', function (Request $request, int $fileType) {
    return "generating fileType $fileType";
})->whereIn('fileType', ['pdf', 'xlsx', 'csv']);


// We can also use enum types to validate against the values passed as route parameters.
Route::get('/files/{fileType}', function (Request $request, FileType $fileType) {
    return "generating fileType $fileType->value";
});


// TRANSACTIONS ON CONTROLLERS:
Route::get('/transactions', [TransactionController::class, 'index']);
Route::get('/transactions/{transactionId:[0-9]+}', [TransactionController::class, 'show']); // without using ROUTE MODEL BINDING.
Route::get('/transactions/create', [TransactionController::class, 'create']);
Route::post('/transactions', [TransactionController::class, 'store']);
Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);


Route::get('/transactions/{transactionId}/process', ProcessTransactionController::class);


Route::redirect('/home', '/dashboard');
