<?php

use App\Http\Controllers\Developer\SubjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('subjects', SubjectController::class)
        ->only(['store', 'destroy', 'index', 'update'])
        ->withTrashed(['show', 'update'])
        ->names('developer.subjects')
        ->missing(function () {
            return redirect()->back()->with('Info', 'Subject with that name does not exists or has been deactivated.');
        }),

    Route::put('subjects/{subject}/restore', [SubjectController::class, 'restore'])->name('developer.subjects.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'Subject with that name does not exists.');
    }),
]);
