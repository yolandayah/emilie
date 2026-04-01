<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $userData = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //$userData['password'] = bcrypt($userData['password']);

        $user = User::create($userData);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

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

        dd($user);
    }
}
