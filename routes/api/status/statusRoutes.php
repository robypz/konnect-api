<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;
Route::apiResource('statuses', StatusController::class)->middleware('auth:sanctum');