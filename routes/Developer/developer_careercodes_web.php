<?php

use App\Http\Controllers\Developer\CareerCodeController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('careercode', CareerCodeController::class)
        ->only(['store', 'destroy', 'update', 'edit'])
        ->withTrashed(['edit', 'update'])
        ->names('developer.careercodes')
        ->missing(function () {
            return redirect()->back()->with('Info', 'CareerCode with that information does not exists or has been deactivated.');
        }),

    Route::put('careercode/{careercode}/restore', [CareerCodeController::class, 'restore'])->name('developer.careercodes.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'CareerCode with that information does not exists.');
    }),
]);
