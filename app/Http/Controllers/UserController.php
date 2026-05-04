<?php
// SPDX-License-Identifier: GPL-3.0-or-later

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::orderBy('username')
                     ->paginate(150)
                     ->withQueryString();

        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user  = User::find($id);
        $roles = Role::all();

        return view('user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $userData = $request->validate([
            'username' =>  'required|string|max:255',
            'name' =>  'required|string|max:255',
            'email' => 'required|string|max:255|email',
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed'
            ]);
        }

        $dbUser = User::find($id);

        if ($dbUser->username != $request->username) {

            $otherUser= User::where('username', $request->username)
                            ->first();

            if ($otherUser) {
                return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['username' => 'Nombre de usuario invalido o ya existe.']);
            }
        }

        if ($dbUser->email != $request->email) {

            $otherUser= User::where('email', $request->email)
                            ->first();

            if ($otherUser) {
                return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['email' => 'Email invalido o ya existe.']);
            }
        }

        $dbUser->username = $request->username;
        $dbUser->name = $request->name;
        $dbUser->email = $request->email;
        if ($request->password) {
            $dbUser->password = $request->password;
        }
        $dbUser->save();

        if (Auth::user()->can('user.edit.roles')) {

            $dbRoles = Role::all();
            $roles = [];

            foreach ($dbRoles as $rol) {
                if ($request->has('chk'."$rol->name")) {
                    $roles[] = $rol->name;
                }
            }
            $dbUser->syncRoles($roles);
        }

        return redirect()
                ->route('dashboard')
                ->with('success','El usuario se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
