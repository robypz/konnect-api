<?php

use Illuminate\Support\Facades\Route;
use Src\Identity\Infrastructure\Http\Controllers\Commands\SignInController;
use Src\Identity\Infrastructure\Http\Controllers\Queries\GetAuthenticatedUserController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/user', GetAuthenticatedUserController::class);
    });
});

Route::prefix('auth')->group(function () {
    Route::post('/signin', SignInController::class);
})->middleware('guest');
