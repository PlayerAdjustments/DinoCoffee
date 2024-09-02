<?php

use App\Http\Controllers\Developer\StudyPlanController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::resource('studyPlan', StudyPlanController::class)
        ->only(['store', 'destroy', 'update', 'edit'])
        ->withTrashed(['edit', 'update'])
        ->names('developer.studyplans')
        ->missing(function () {
            return redirect()->back()->with('Info', 'StudyPlan with that information does not exists or has been deactivated.');
        }),

    Route::put('studyplan/{studyPlan}/restore', [StudyPlanController::class, 'restore'])->name('developer.studyplans.restore')->withTrashed()->missing(function () {
        return redirect()->back()->with('Info', 'StudyPlan with that information does not exists.');
    }),
]);
