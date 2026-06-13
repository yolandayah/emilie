<?php

// SPDX-License-Identifier: GPL-3.0-or-later

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    public function showUpdatePasswordForm(): View
    {
        return view('auth.update-password');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $login = $request->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials = [
            $fieldType => $login,
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect()
                ->intended('/dashboard')
                ->with('success', 'Login exitoso');
        }

        return back()->withInput()
            ->with('error', 'Usuario y/o constraseña invalidas');
    }

    public function logout(Request $request): RedirectResponse
    {
        // Session::flush();

        Auth::logout();
        // Auth::guard('web')->logout();

        $request->session()->invalidate();
        // Session::invalidate();

        $request->session()->regenerateToken();
        // Session::regenerateToken();

        return redirect()
            ->route('home')
            ->with('success', 'Logout exitoso');
    }

    public function register(Request $request): RedirectResponse
    {
        $userData = $request->validate([
            'username' => 'required|string|lowercase|max:255|unique:users',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Registro exitoso');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:6',
        ]);

        $user = auth()->user();
        $user->password = $request->password; // Hash::make($request->password);
        $user->force_password_change = false; // <--- AQUÍ se libera al usuario
        $user->save();

        return redirect()
            ->route('dashboard')
            ->with('status', 'Contraseña actualizada correctamente.');
    }
}
