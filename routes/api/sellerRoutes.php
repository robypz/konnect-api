<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;

Route::apiResource('sellers', SellerController::class);
