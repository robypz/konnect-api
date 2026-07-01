<?php

use Illuminate\Support\Facades\Route;
use Src\Events\Infrastructure\Http\Controllers\Commands\CreateEventController;
use Src\Events\Infrastructure\Http\Controllers\Commands\UpdateEventController;
use Src\Events\Infrastructure\Http\Controllers\Commands\DeleteEventController;
use Src\Events\Infrastructure\Http\Controllers\Queries\ListEventsController;
use Src\Events\Infrastructure\Http\Controllers\Queries\GetEventByIdController;

Route::prefix('events')->group(function () {
    Route::post('/', CreateEventController::class)->name('events.store');
    Route::get('/', ListEventsController::class)->name('events.index');
    Route::get('/{eventId}', GetEventByIdController::class)->name('events.show');
    Route::put('/{eventId}', UpdateEventController::class)->name('events.update');
    Route::delete('/{eventId}', DeleteEventController::class)->name('events.destroy');
});