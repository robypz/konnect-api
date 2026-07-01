<?php

use Illuminate\Support\Facades\Route;
use Src\HR\Infrastructure\Http\Controllers\Commands\CreateDepartmentController;
use Src\HR\Infrastructure\Http\Controllers\Commands\UpdateDepartmentController;
use Src\HR\Infrastructure\Http\Controllers\Commands\DeleteDepartmentController;
use Src\HR\Infrastructure\Http\Controllers\Queries\ListDepartmentsController;
use Src\HR\Infrastructure\Http\Controllers\Queries\GetDepartmentByIdController;

Route::prefix('departments')->group(function () {
    Route::post('/', CreateDepartmentController::class)->name('departments.store');
    Route::get('/', ListDepartmentsController::class)->name('departments.index');
    Route::get('/{departmentId}', GetDepartmentByIdController::class)->name('departments.show');
    Route::put('/{departmentId}', UpdateDepartmentController::class)->name('departments.update');
    Route::delete('/{departmentId}', DeleteDepartmentController::class)->name('departments.destroy');
});
