<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
