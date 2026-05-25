<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function dashboard(): View
    {
        $user = auth()->user();

        $grupos = $user->inscrito;

        $grupos->load('asignatura');

        return view('dashboard',compact('grupos'));
    }

    public function home(): View
    {
        return view('home');
    }
}
