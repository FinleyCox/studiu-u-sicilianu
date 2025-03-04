<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\LoginController;

Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
