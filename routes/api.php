<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('departments',DepartmentController::class);

Route::apiResource('employees',EmployeeController::class);
Route::get('employees/search/{search}', [EmployeeController::class, 'search']);

Route::apiResource('statuses',StatusController::class);

Route::apiResource('projects',ProjectController::class);
