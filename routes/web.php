<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Authentication.Login');
})->name('main.login');

Route::prefix('auth')->group(fn() => [
    Route::post('login', [AuthController::class, 'login'])->name('auth.login'),
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')
]);

Route::get('/dashboard', function(){
    return view('Pages.Dashboard.MainDashboard');
})->middleware(Role::class.':DEV,ADM,DIR,COO,DOC,ALU')->name('dashboard.main');
