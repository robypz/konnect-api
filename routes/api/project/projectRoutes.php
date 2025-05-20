<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;


Route::controller(ProjectController::class)->prefix('projects')->group(function () {
    Route::put('/updateEmployees/{project}','updateEmployees');
    Route::put('/{project}/addTask','addTask');
    Route::get('/byEmployee/{employeeId}','byEmployee');
})->middleware('auth:sanctum');

Route::apiResource('projects',ProjectController::class)->middleware('auth:sanctum');
