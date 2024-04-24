<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        // Check if user is authenticated
        if(!Auth::check()) {
            return redirect(route('login'))->with('error', 'Please Login First');
        }

        // if authenticated
        $user = Auth::user();

        // grant access if it is user role
        if($user->role == 'user') {
            return $next($request);
        } 

        if($user->role == 'admin') {
            return redirect('/admin');
        };

        if($user->role == 'superadmin') {
            return redirect('/superadmin');
        };
    }
}
