<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // first check if the user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login first!');
        }

        // if authenticated
        $user = auth()->user();

        // grant access if user is admin
        if ($user->role === 'admin') {
            return $next($request);
        }

        // if not admin, redirect to appropriate route
        if($user->role === 'superadmin') {
            return redirect('/superadmin');
        }

        if($user->role === 'user') {

            return redirect('/user');
        }


    }
}
