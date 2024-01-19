<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $unauthenticatedRoutes = [
            'list',
            'login',
            'authenticate',
        ];


        if (in_array($request->route()->getName(), $unauthenticatedRoutes)) {
            return $next($request);
        }

        if (session('authenticated')) {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Incorrect login.');
    }
}
