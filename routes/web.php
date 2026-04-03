<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
});

/*
Route::get('login', function () {
    return view('auth.login');
})->name('login');
*/
Route::get('login',[LoginController::class, 'showLoginForm'])
    ->name('login');

/*
Route::post('login', LoginController::class)
    ->middleware('throttle:5,1')
    ->name('login.attempt');
*/
Route::post('login', [LoginController::class, 'login'])
    ->name('login.process');

/*
Route::view('dashboard','dashboard')
->middleware('auth')
	->name('dashboard');
*/
Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

/*
Route::post('logout', function () {

    //Auth::logout();
	Auth::guard('web')->logout();

    //$request->session()->invalidate();
	Session::invalidate();

    //$request->session()->regenerateToken();
	Session::regenerateToken();

    return redirect('/');

})->name('logout');
*/
Route::post('logout',[LoginController::class, 'logout'])
    ->name('logout');

//Route::view('register','auth.register')->name('register');
Route::get('register',[RegisterController::class, 'showForm'])
    ->name('register');

//Route::post('register', RegisterController::class)->name('register.store');
Route::post('register', [RegisterController::class, 'processForm'])
    ->name('register.process');

