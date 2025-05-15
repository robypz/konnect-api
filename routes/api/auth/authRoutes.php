<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::post('/signout', 'signout');
        Route::get('/user', 'user');
    });
});



Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/signin', 'signin');
    Route::post('/signup', 'signup');
    Route::post('/sendPasswordResetLink', 'sendPasswordResetLink');
    Route::post('/resetPassword', 'resetPassword');
})->middleware('guest');
