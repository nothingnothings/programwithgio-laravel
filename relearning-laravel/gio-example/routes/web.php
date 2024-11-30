<?php

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

Route::redirect('/home', '/dashboard');
