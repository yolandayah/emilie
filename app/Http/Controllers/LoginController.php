<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class LoginController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'No se encuentra el Email y/o la Contraseña.',
        ])->onlyInput('email');
    }

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

        if (Auth::attempt($credentials)) {
            return redirect('/')
                ->with('status', 'Login exitoso');
        }

        return back()->withInput()
                     ->with('status','Credenciales invalidas');
    }

    public function logout(): RedirectResponse
    {
        Session::flush();

        Auth::logout();

        return redirect('/')->with('status','Logout exitoso');
    }
}
