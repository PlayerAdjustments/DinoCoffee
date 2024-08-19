<?php

use App\Http\Controllers\Developer\GenerationController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('generation', GenerationController::class)
        ->only(['store', 'destroy', 'update', 'index'])
        ->withTrashed(['update'])
        ->names('developer.generations')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Generation with that information does not exists or has been deactivated.');
        }),

    Route::put('generation/{generation}/restore', [GenerationController::class, 'restore'])->name('developer.generations.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Generation with that information does not exists.');
    }),
]);
