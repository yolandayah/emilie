<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showForm(): View
    {
        return view('auth.register');
    }

    public function processForm(Request $request): RedirectResponse
    {
        $userData = $request->validate([
            'username' =>  'required|string|max:255|unique:users',
            'name' =>  'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
