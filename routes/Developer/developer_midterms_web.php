<?php

use App\Http\Controllers\Developer\MidtermController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware(['auth', 'role:DEV'])->group(fn () => [
    Route::resource('midterm', MidtermController::class)
        ->only(['store', 'destroy', 'update', 'index'])
        ->withTrashed(['edit', 'update'])
        ->names('developer.midterms')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Midterm with that information does not exists or has been deactivated.');
        }),

    Route::put('midterm/{midterm}/restore', [MidtermController::class, 'restore'])->name('developer.midterms.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Midterm with that information does not exists.');
    }),
]);
