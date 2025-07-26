<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\LoginController;

// Health check endpoint
Route::get('/health', function() {
    return response()->json(['status' => 'ok', 'timestamp' => now()]);
});

Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
