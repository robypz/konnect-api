<?php

use Illuminate\Support\Facades\Route;
use Src\HR\Infrastructure\Http\Controllers\Commands\CreateEmployeeController;
use Src\HR\Infrastructure\Http\Controllers\Commands\UpdateEmployeeController;
use Src\HR\Infrastructure\Http\Controllers\Commands\DeleteEmployeeController;
use Src\HR\Infrastructure\Http\Controllers\Queries\ListEmployeesController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetEmployeeByIdController;
use Src\HR\Infrastructure\Http\Controllers\Queries\SearchEmployeesController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetEmployeeTasksController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetEmployeePostsController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetEmployeeEventsController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetEmployeeProjectsController;

Route::middleware('auth:sanctum')->prefix('employees')->group(function () {
    Route::post('/', CreateEmployeeController::class)->name('employees.store');
    Route::get('/', ListEmployeesController::class)->name('employees.index');
    Route::get('/search', SearchEmployeesController::class)->name('employees.search');
    Route::get('/{employeeId}', GetEmployeeByIdController::class)->name('employees.show');
    Route::get('/{employeeId}/tasks', GetEmployeeTasksController::class)->name('employees.tasks');
    Route::get('/{employeeId}/posts', GetEmployeePostsController::class)->name('employees.posts');
    Route::get('/{employeeId}/events', GetEmployeeEventsController::class)->name('employees.events');
    Route::get('/{employeeId}/projects', GetEmployeeProjectsController::class)->name('employees.projects');
    Route::put('/{employeeId}', UpdateEmployeeController::class)->name('employees.update');
    Route::delete('/{employeeId}', DeleteEmployeeController::class)->name('employees.destroy');
});
