<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // middeleware role
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check() && (Auth::user()->role === $role || Auth::user()->role === 'admin')) {
            return $next($request);
        }
    
        abort(403, 'Unauthorized.');
    }
}
