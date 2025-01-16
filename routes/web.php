<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

//? Login page.
Route::get('/', function () {
    return view('Pages.Authentication.Login');
})->name('main.login');

//? Authorization routes
Route::prefix('auth')->group(fn() => [
    Route::post('login', [AuthController::class, 'login'])->name('auth.login'),
    Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout')
]);

//? Notification routes
Route::delete('/notification/{notification}', [NotificationController::class, 'destroy'])->middleware('auth')->name('notification.destroy');

//? Dashboard routes
Route::get('/dashboard', function(){
    return view('Pages.Dashboard.MainDashboard');
})->middleware(Role::class.':DEV,ADM,DIR,COO,DOC,ALU')->name('dashboard.main');
