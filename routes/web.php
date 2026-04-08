<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\ForcePasswordChange;

Route::get('/', function () {
    return view('home');
});

Route::get('update-password', function () {
    return view('auth.update-password');
})->name('password.update');

Route::get('login',[LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('login', [LoginController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.process');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'password.force'])
    ->name('dashboard');

Route::post('logout',[LoginController::class, 'logout'])
    ->name('logout');

Route::get('register',[RegisterController::class, 'showForm'])
    ->name('register');

Route::post('register', [RegisterController::class, 'processForm'])
    ->name('register.process');

