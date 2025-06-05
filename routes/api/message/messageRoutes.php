<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(MessageController::class)->prefix('messages')->group(function () {
        Route::get('/byChat/{chatId}', 'byChat');
        Route::post('/', 'store');
    });
});