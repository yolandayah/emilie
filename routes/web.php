<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\ForcePasswordChange;

Route::get('/', function () {
    return view('home');
});

Route::get('update-password', function () {
    return view('auth.update-password');
})->name('password.update');

Route::get('login',[AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.process');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'password.force'])
    ->name('dashboard');

Route::post('logout',[AuthController::class, 'logout'])
    ->name('logout');

Route::get('register',[AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('register', [AuthController::class, 'register'])
    ->name('register.process');

