<?php
// SPDX-License-Identifier: GPL-3.0-or-later

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (   auth()->check()
            && auth()->user()->force_password_change)
        {
            // Avoid infinite redirect loop by allowing access
            // to the change password page
            if (!$request->is('update-password*') && !$request->is('logout')) {
                return redirect()
                        ->route('password.update');
            }
        }
        return $next($request);
    }
}
