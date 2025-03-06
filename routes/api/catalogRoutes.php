<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;

Route::apiResource('catalogs', CatalogController::class);
