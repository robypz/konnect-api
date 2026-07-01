<?php

use Illuminate\Support\Facades\Route;
use Src\Identity\Infrastructure\Http\Controllers\Commands\SignInController;
use Src\Identity\Infrastructure\Http\Controllers\Commands\SignUpController;
use Src\Identity\Infrastructure\Http\Controllers\Commands\SignOutController;
use Src\Identity\Infrastructure\Http\Controllers\Commands\SendPasswordResetLinkController;
use Src\Identity\Infrastructure\Http\Controllers\Commands\ResetPasswordController;
use Src\Identity\Infrastructure\Http\Controllers\Queries\GetAuthenticatedUserController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/signout', SignOutController::class);
        Route::get('/user', GetAuthenticatedUserController::class);
    });
});

Route::prefix('auth')->group(function () {
    Route::post('/signin', SignInController::class);
    Route::post('/signup', SignUpController::class);
    Route::post('/sendPasswordResetLink', SendPasswordResetLinkController::class);
    Route::post('/resetPassword', ResetPasswordController::class);
})->middleware('guest');
