<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            //$request->session()->regenerate();

            return redirect()->intended('/')
                ->with('status', 'Login exitoso');
        }

        return back()->withInput()
                     ->with('status','Credenciales invalidas');

        //return back()->withErrors([
        //    'email' => 'No se encuentra el Email y/o la Contraseña.',
        //])->onlyInput('email');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();

        Auth::logout();
        //Auth::guard('web')->logout();

        //$request->session()->invalidate();
	    //Session::invalidate();

        //$request->session()->regenerateToken();
	    //Session::regenerateToken();

        return redirect('/')->with('status','Logout exitoso');
    }
}
