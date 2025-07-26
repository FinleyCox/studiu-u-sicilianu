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
        'url' => config('app.url'),
        'timestamp' => now()
    ]);
});

// Root endpoint for health check
Route::get('/', function() {
    return response()->json([
        'status' => 'ok',
        'message' => 'studiu u sicilianu is running',
        'timestamp' => now()
    ]);
});

// Vue application route
Route::get('/app/{any?}', function() {
    return view('app');
})->where('any', '.*');
