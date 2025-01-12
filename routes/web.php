<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Authentication.Login');
});

Route::prefix('auth')->group(fn() => [
    Route::post('login', [AuthController::class, 'login'])->name('auth.login'),
]);
