<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks',TaskController::class)->middleware(['auth:sanctum','hasRole:admin']);

Route::controller(TaskController::class)->prefix('tasks')->group(function () {
    Route::get('/byEmployee/{employeeId}','byEmployee');
})->middleware('auth:sanctum');
