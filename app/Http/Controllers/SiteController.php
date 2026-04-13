<?php

namespace App\Http\Controllers;

//use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
//use Session;
//use URL;

class SiteController extends Controller
{
    //public function dashboard(): View|RedirectResponse
    public function dashboard(): View
    {
        /*
        if ( ! Auth::check() ) {

            Session::put('url.intended', URL::full());

            return redirect()->route('login')
                             ->with('status', 'Favor de ingresar al sistema');
        }
        */
        return view('dashboard');
    }

    public function home(): View
    {
        return view('home');
    }
}
