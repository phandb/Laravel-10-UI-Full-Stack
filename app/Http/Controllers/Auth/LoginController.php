<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request) {

        // validate credential of the login user
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            
            // retrieve the user role
            $user_role = Auth::user()->role;

            // Redirect user accoring to their role
            // switch ($user_role) {
            //     case "superadmin":
            //         return redirect('/candidates/');
            //         break;
            //     case "admin":
            //         return redirect('/candidates/');

            //         break;
            //     case "user":
            //         return redirect('/candidates/');
            //         break;
            //     default:
            //     // if user role is not found, logout the user
            //         Auth::logout();
            //         return back()->with('error', 'Oops, sonething went wrong.  Pleaase login.');
            //         break;
            // }

            return redirect('/candidates/');
        }
        else {
            return redirect('/login');
        }
    }

}
