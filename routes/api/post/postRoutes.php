<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::apiResource('posts',PostController::class)->middleware('auth:sanctum');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::post('/react/{post}', 'react');
    });
});