<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::controller(ProjectController::class)->prefix('projects')->group(function () {
    Route::get('/updateEmployees/{project}','updateEmployees');
    Route::get('/{project}/addTask','addTask');
})->middleware('auth:sanctum');

Route::apiResource('projects',ProjectController::class)->middleware('auth:sanctum');
