<?php

use App\Http\Controllers\Developer\SchoolController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('schools', SchoolController::class)
        ->withTrashed(['show', 'edit', 'update'])
        ->names('developer.schools')
        ->missing(function () {
            return redirect()->back()->with('Info', 'School with that abbreviation does not exists or has been deactivated.');
        }),

    Route::put('schools/{school}/restore', [SchoolController::class, 'restore'])->name('developer.schools.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'School with that abbreviation does not exists.');
    }),
]);
