<?php

use App\Http\Controllers\Developer\CareerController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('careers', CareerController::class)
        ->withTrashed(['show', 'edit', 'update'])
        ->names('developer.careers')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Career with that abbreviation does not exists or has been deactivated.');
        }),

    Route::put('careers/{career}/restore', [CareerController::class, 'restore'])->name('developer.careers.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Career with that abbreviation does not exists.');
    }),
]);
