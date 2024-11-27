<?php

use App\Http\Controllers\Developer\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth', 'role:DEV')->group(fn() => [
    /**
     * Users routes
     */
    Route::prefix('dashboard/developer/users')->group(fn() => [
        Route::get('/students', [UserController::class, 'listStudents'])->name('developer.users.listStudents'),
        Route::get('/employees', [UserController::class, 'listEmployees'])->name('developer.users.listEmployees'),
        Route::get('/{user}/delete', [UserController::class, 'deleteUser'])->name('developer.users.delete')->missing(function () {
            return redirect()->back()->with('Info', 'User with that matricula does not exist.');
        }),
        Route::get('/{user}/restore', [UserController::class, 'restoreUser'])->name('developer.users.restore')->withTrashed(),
    ]),

    /**
     * Creating users routes
     */
    Route::prefix('dashboard/developer/users/create')->group(fn() => [
        Route::get('/students', [UserController::class, 'createStudent'])->name('developer.users.createStudent'),
        Route::get('/employees', [UserController::class, 'createEmployee'])->name('developer.users.createEmployee'),
        Route::post('/user', [UserController::class, 'storeUser'])->name('developer.users.store'),
        Route::post('/user/csv', [UserController::class, 'storeCSV'])->name('developer.users.storeCSV'),
        Route::get('/user/csv/download', [UserController::class, 'downloadCSV'])->name('developer.users.downloadCSV'),
        Route::get('/user/uploadcsv', [UserController::class, 'uploadCSV'])->name('developer.users.uploadCSV')
    ]),

    /**
     * Editing/Updating routes
     */
    Route::prefix('dashboard/developer/users/edit')->group(fn() => [
        Route::get('/{user}', [UserController::class, 'editUser'])->name('developer.users.edit')->withTrashed()->missing(function () {
            return redirect()->back()->with('Info', 'User with that matricula does not exists.');
        }),
        Route::post('/{user}/update', [UserController::class, 'updateUser'])->name('developer.users.update')->withTrashed(),
    ]),

    /**
     * Showing Users
     */
    Route::prefix('dashboard/developer/users/show')->group(fn() => [
        Route::get('/{user}', [UserController::class, 'showUser'])->name('developer.users.show')->withTrashed()->missing(function () {
            return redirect()->back()->with('Info', 'User with that matricula does not exist.');
        }),
    ]),

]);
