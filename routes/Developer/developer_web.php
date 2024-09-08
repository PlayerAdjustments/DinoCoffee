<?php

use App\Http\Controllers\Developer\DeveloperController;
use App\Http\Controllers\Developer\NotificationController;
use App\Http\Controllers\Developer\UserController;
use Illuminate\Support\Facades\Route;


/**
 * Main page/route
 */
Route::prefix('dashboard/developer')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::get('/', [DeveloperController::class, 'index'])->name('developer.index'),
]);

/**
 * Notification route
 */
Route::prefix('dashboard/developer/notification')->middleware('auth', 'role:DEV')->group(fn() => [
    Route::get('{notification}/delete', [NotificationController::class, 'deleteNotification'])->name('notification.delete')->missing(function () {
        return redirect()->back()->with('Info', 'Notification does not exists.');
    }),
]);
