<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function edit() {

        //get the authenticated user object
        $user = Auth::user();

        // call view edit to show user profile
        return view('auth.profile-edit', compact('user'));
    }

    public function update(Request $request) {

        //get the authenticated user object
        $user = Auth::user();
        
        // validate the request data
        $data = $request->validate([
            //using regex for unicode
            'name' => 'required|string|regex:/^[\pL\s\-\.,]+$/u|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($data);
        // redirect back with a success message
        return redirect()->back()->withSuccess("Your Profile has been updated successfully!");
    }   
}
