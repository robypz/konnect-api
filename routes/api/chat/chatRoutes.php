<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(ChatController::class)->prefix('chats')->group(function () {
        Route::post('/', 'store');
        Route::get('/byEmployee', 'byEmployee');
    });
});
