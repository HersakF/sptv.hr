<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && auth()->user()->role == 'administrator'){
            return redirect('/cms/dashboard');
        }
        if (Auth::guard($guard)->check() && auth()->user()->role == 'superadministrator'){
            return redirect('/cms/dashboard');
        }
        if (Auth::guard($guard)->check() && auth()->user()->role == 'customer'){
            return redirect('/');
        }
        return $next($request);
    }
}