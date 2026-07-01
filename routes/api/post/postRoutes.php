<?php

use Illuminate\Support\Facades\Route;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\CreatePostController;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\UpdatePostController;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\DeletePostController;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\ReactToPostController;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\CreateCommentController;
use Src\Collaboration\Infrastructure\Http\Controllers\Commands\DeleteCommentController;
use Src\Collaboration\Infrastructure\Http\Controllers\Queries\ListPostsController;
use Src\Collaboration\Infrastructure\Http\Controllers\Queries\GetPostByIdController;
use Src\Collaboration\Infrastructure\Http\Controllers\Queries\ListCommentsController;

Route::prefix('posts')->group(function () {
    Route::post('/', CreatePostController::class)->name('posts.store');
    Route::get('/', ListPostsController::class)->name('posts.index');
    Route::get('/{postId}', GetPostByIdController::class)->name('posts.show');
    Route::put('/{postId}', UpdatePostController::class)->name('posts.update');
    Route::delete('/{postId}', DeletePostController::class)->name('posts.destroy');
    Route::post('/{postId}/react', ReactToPostController::class)->name('posts.react');
    
    Route::prefix('/{postId}/comments')->group(function () {
        Route::post('/', CreateCommentController::class)->name('comments.store');
        Route::get('/', ListCommentsController::class)->name('comments.index');
        Route::delete('/{commentId}', DeleteCommentController::class)->name('comments.destroy');
    });
});