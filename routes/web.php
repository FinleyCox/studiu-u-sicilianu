<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\LoginController;

// Health check endpoint
Route::get('/health', function() {
    return response()->json(['status' => 'ok', 'timestamp' => now()]);
});

// Simple test endpoint
Route::get('/test', function() {
    return response()->json([
        'message' => 'Hello from Laravel!',
        'env' => app()->environment(),
        'debug' => config('app.debug'),
        'url' => config('app.url')
    ]);
});

Route::get('/{any}', function() {
    return view('app');
})->where('any', '.*');
