<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/signout', 'signout');
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/signin','signin');
    Route::post('/signup','signup');
    Route::post('/forgot-password','forgotPassword');
    Route::post('/reset-password','resetPassword');
})->middleware('guest');
