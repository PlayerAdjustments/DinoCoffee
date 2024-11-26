<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('schedule', ScheduleController::class)
        ->only(['store', 'destroy', 'update', 'index'])
        ->withTrashed(['update'])
        ->names('developer.schedule')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Schedule with that information does not exists or has been deactivated.');
        }),

    Route::put('schedule/{schedule}/restore', [ScheduleController::class, 'restore'])->name('developer.schedule.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Schedule with that information does not exists.');
    }),
]);
