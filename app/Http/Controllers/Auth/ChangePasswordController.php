<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            // 'new_password_confirm'=> ['required', 'same:new_pssword'],

        ]);

        $user = auth()->user();

        // Check if the current password matches the one in the database
        if (Hash::check($request->current_password, $user->password)) {
            // update the user's password
            $user->update(['password' => Hash::make($request->new_password)]);

            return redirect()->route('candidates.index')->with('success', 'Password changed successfully!');

        } else {
            return redirect()->back()->withErrors(['current_password' => 'Incorrect current password.']);
        }

    //     User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

    //    return redirect(route('candidates.index'))->with(['success' => 'Password updated successfully']);

    }

}
