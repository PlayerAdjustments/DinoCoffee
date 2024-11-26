<?php

use App\Http\Controllers\Developer\MidtermController;
use App\Models\Midterm;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('midterm', MidtermController::class)
        ->only(['store', 'destroy', 'update', 'index'])
        ->withTrashed(['update'])
        ->names('developer.midterms')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Generation with that information does not exists or has been deactivated.');
        }),

    Route::put('midterm/{midterm}/restore', [MidtermController::class, 'restore'])->name('developer.generations.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Midterm with that information does not exists.');
    }),
]);
