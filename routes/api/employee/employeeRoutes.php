<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::controller(EmployeeController::class)->prefix('employees')->group(function () {
    Route::get('/search/{search}','search');
    Route::get('/{employee}/tasks','tasks');
})->middleware('auth:sanctum');

Route::apiResource('employees',EmployeeController::class)->middleware('auth:sanctum');
