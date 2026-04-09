<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\ForcePasswordChange;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login',[AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('login.process');

Route::post('/logout',[AuthController::class, 'logout'])
    ->name('logout');

Route::get('/register',[AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.process');

Route::middleware(['auth'])->group(function () {

    // Rutas protegidas por el cambio de password
    Route::middleware(['force.password'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');
    });

    // Rutas para realizar el cambio (Fuera del middleware de forzado)
    Route::get('/update-password', [AuthController::class, 'showUpdatePasswordForm'])->name('password.update');
    Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('password.update.process');

});
