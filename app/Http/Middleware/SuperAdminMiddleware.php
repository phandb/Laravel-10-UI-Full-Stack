<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user loggin
        if (!Auth::check() ) {
            return redirect()->route('login')->with('error', 'Please login first!');
        }

        // if authenticated
        $user = Auth::user();
        // grant request if superadmin
        if($user->role == 'superadmin') {
            return $next($request);
        }
        // if not redirect to appropeiate routes
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role == 'user') {
            return redirect()->route('user.dashboard');
        }

    }
}
