<?php
// SPDX-License-Identifier: GPL-3.0-or-later

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ForcePasswordChange;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])
    ->name('home');

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

        Route::get('/dashboard', [SiteController::class, 'dashboard'])
            ->name('dashboard');

        Route::resource('/users', UserController::class)
            ->only(['index','edit','update'])
            ->names('admin.user');

        Route::get('/asignatura', [AsignaturaController::class, 'index'])
            ->name('grupos.index');

        Route::get('/asignatura/{id}/grupos', [AsignaturaController::class, 'grupos'])
            ->name('grupos.lista');
    });

    // Rutas para realizar el cambio (Fuera del middleware de forzado)
    Route::get('/update-password', [AuthController::class, 'showUpdatePasswordForm'])->name('password.update');
    Route::post('/update-password', [AuthController::class, 'updatePassword'])->name('password.update.process');

});
