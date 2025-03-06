<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

include __DIR__ . '/api/sellerRoutes.php';
include __DIR__ . '/api/catalogRoutes.php';
include __DIR__ . '/api/categoryRoutes.php';
include __DIR__ . '/api/productRoutes.php';
