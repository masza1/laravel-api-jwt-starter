<?php

use App\Http\Controllers\Api\{AuthController};
use Illuminate\Support\Facades\Route;

Route::get('version', function () {
    return [
        'message' => "starter for laravel api jwt with spatie laravel",
        'framework' => 'Laravel',
        'version' => app()->version(),
    ];
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register',  'register');
    Route::post('login',  'login');
    Route::post('refresh',  'refresh');

    Route::middleware('jwt.auth')->group(function () {
        Route::get('user',  'user');
        Route::post('logout',  'logout');
    });
});
