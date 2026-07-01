<?php

use Illuminate\Support\Facades\Route;
use Src\Projects\Infrastructure\Http\Controllers\Commands\CreateProjectController;
use Src\Projects\Infrastructure\Http\Controllers\Commands\UpdateProjectController;
use Src\Projects\Infrastructure\Http\Controllers\Commands\DeleteProjectController;
use Src\Projects\Infrastructure\Http\Controllers\Commands\UpdateProjectEmployeesController;
use Src\Projects\Infrastructure\Http\Controllers\Commands\AddTaskToProjectController;
use Src\Projects\Infrastructure\Http\Controllers\Queries\ListProjectsController;
use Src\Projects\Infrastructure\Http\Controllers\Queries\GetProjectByIdController;
use Src\Projects\Infrastructure\Http\Controllers\Queries\ListProjectsByEmployeeController;

Route::prefix('projects')->group(function () {
    Route::post('/', CreateProjectController::class)->name('projects.store');
    Route::get('/', ListProjectsController::class)->name('projects.index');
    Route::get('/{projectId}', GetProjectByIdController::class)->name('projects.show');
    Route::put('/{projectId}', UpdateProjectController::class)->name('projects.update');
    Route::delete('/{projectId}', DeleteProjectController::class)->name('projects.destroy');
    Route::put('/{projectId}/employees', UpdateProjectEmployeesController::class)->name('projects.updateEmployees');
    Route::post('/{projectId}/tasks', AddTaskToProjectController::class)->name('projects.addTask');
    Route::get('/employees/{employeeId}', ListProjectsByEmployeeController::class)->name('projects.byEmployee');
});
