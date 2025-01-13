<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.Authentication.Login');
});

Route::prefix('auth')->group(fn() => [
    Route::post('login', [AuthController::class, 'login'])->name('auth.login'),
]);

Route::get('/dashboard', function(){
    return view('Pages.Dashboard.MainDashboard');
})->name('dashboard.main');
