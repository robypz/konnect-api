<?php

use Illuminate\Support\Facades\Route;
use Src\Communication\Infrastructure\Http\Controllers\Commands\CreateMessageController;
use Src\Communication\Infrastructure\Http\Controllers\Commands\DeleteMessageController;
use Src\Communication\Infrastructure\Http\Controllers\Queries\ListMessagesController;

Route::prefix('messages')->group(function () {
    Route::post('/{chatId}', CreateMessageController::class)->name('messages.store');
    Route::get('/{chatId}', ListMessagesController::class)->name('messages.index');
    Route::delete('/{messageId}', DeleteMessageController::class)->name('messages.destroy');
});