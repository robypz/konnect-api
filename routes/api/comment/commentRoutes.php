<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(CommentController::class)->prefix('comments')->group(function () {
        Route::get('/byPost', 'byPost');
        Route::post('/', 'store');
    });
});