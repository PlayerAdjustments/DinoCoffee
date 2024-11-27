<?php

use App\Http\Controllers\Developer\MidtermController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard/developer')->middleware(['auth', 'role:DEV'])->group(function () {
    // Rutas de CRUD para Midterms
    Route::resource('midterm', MidtermController::class)
        ->only(['store', 'destroy', 'update', 'index'])
        ->names('developer.midterms');

    // Restaurar un Midterm eliminado
    Route::put('midterm/{midterm}/restore', [MidtermController::class, 'restore'])
        ->name('developer.midterms.restore');
});

