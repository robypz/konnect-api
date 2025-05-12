<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

include 'api/employee/employeeRoutes.php';
include 'api/task/taskRoutes.php';
include 'api/category/categoryRoutes.php';
include 'api/department/departmentRoutes.php';
include 'api/project/projectRoutes.php';
include 'api/auth/authRoutes.php';
