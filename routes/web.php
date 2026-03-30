<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', LoginController::class)
	->middleware('throttle:5,1')
	->name('login.attempt');

Route::view('dashboard','dashboard')
	->middleware('auth')
	->name('dashboard');

Route::post('logout', function () {

    //Auth::logout();
	Auth::guard('web')->logout();

    //$request->session()->invalidate();
	Session::invalidate();

    //$request->session()->regenerateToken();
	Session::regenerateToken();

    return redirect('/');

})->name('logout');

Route::view('register','auth.register')->name('register');

Route::post('register', RegisterController::class)->name('register.store');

