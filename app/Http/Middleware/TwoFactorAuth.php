<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $user = Auth::user();

        if (!$user) {
            return $next($request);
        }

        
        if ($request->routeIs('two-factor.*')) {
            return $next($request);
        }

        
        if ($request->routeIs('logout')) {
            return $next($request);
        }

        
        if ($user->two_factor_enabled && !$user->two_factor_verified) {
            return redirect()->route('two-factor.verify');
        }

        return $next($request);
    }
}
