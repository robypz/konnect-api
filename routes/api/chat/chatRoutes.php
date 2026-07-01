<?php

use Illuminate\Support\Facades\Route;
use Src\Communication\Infrastructure\Http\Controllers\Commands\CreateChatController;
use Src\Communication\Infrastructure\Http\Controllers\Commands\DeleteChatController;
use Src\Communication\Infrastructure\Http\Controllers\Queries\ListChatsController;
use Src\Communication\Infrastructure\Http\Controllers\Queries\GetChatByIdController;

Route::prefix('chats')->group(function () {
    Route::post('/', CreateChatController::class)->name('chats.store');
    Route::get('/', ListChatsController::class)->name('chats.index');
    Route::get('/{chatId}', GetChatByIdController::class)->name('chats.show');
    Route::delete('/{chatId}', DeleteChatController::class)->name('chats.destroy');
});
