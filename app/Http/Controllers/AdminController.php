<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Candidate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function viewLogin() 
    {
        return view('admins.login');
    }
    /**
     * Display a listing of the resource.
     */
    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['message' => 'Error logging in']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $candidates = Candidate::all();
        return view('admins.index', compact('candidates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('admins.edit-candidate', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $data = $request->validate([
            'canFirstName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'canMiddleName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'canLastName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'canSaintName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'dateOfBirth' => 'required',
            'address' => 'nullable',       
            'email' => 'nullable',
            'is_baptized_at_HVMCC' => 'nullable',
            'baptizedYear' => 'nullable',
            //'baptismForm' => 'nullable',
            'file' => 'nullable|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
            'dadFirstName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'dadLastName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'dadPhone' => 'nullable',
            'momFirstName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'momLastName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'momPhone' => 'nullable|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'sponFirstName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
            'sponLastName' => 'required|regex:/^[\p{L}\p{M}0-9\s\-]+$/u',
        ]);

        if ($file = $request->file('file')) {

            // retrieve current file if exists
            $destination = '/uploads/' .$candidate->baptismForm;
            if(file::exists($destination)) {
                // delete the current file before update
                file::delete($destination);
            }
            $fileName = $file->getClientOriginalName();


             //dump($request->file('filePath')->getClientOriginalName());  // get original name of the uploaded file
            // dump($baptismForm->getClientOriginalExtension());  // get original extension
            // dump($baptismForm->getClientMimeType());  // get Mime file type
            
            $candidate->baptismForm = $candidate->canFirstName. '-' .$fileName;

            $candidate->filePath = $request->file('file')->storeAs('uploads', $candidate->canFirstName. '-' .$fileName);
        }
        $candidate->update($data);

       //return redirect(route('candidates.index'))->with(['success' => 'Candidate info updated successfully']);
        
        return redirect()->back()->with('status', 'Candidate information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Forgot password reset

    public function showPasswordResetLinkForm () {
        return view('admins.forget-password-form');
    }

    public function sendPasswordResetLink(Request $request) {

        // validate email: required and exists in admins table column email
        $request->validate([
            'email'=>'required|email|exists:admins,email'
        ]);
        // generate a token
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
        //$name = DB::table('admins')->columns('name')->where($request->name)->first();
        $action_link = route('admin.password-reset-form',['token'=>$token, 'email'=>$request->email]);
        $body = "We have received a request to reset the password for account associated with ".$request->email. ". You can reset your password by clicking the link below.";

        Mail::send('/admins/email-forgot', ['action_link'=>$action_link, 'body'=>$body], 
            function($message) use ($request) {
                $message->from('noreply@coding.net', 'Confirmation');
                $message->to($request->email, 'name')->subject('Reset Password');
        });

        return back()->with('success', 'Check your email for password reset link');

    }

    public function showPasswordResetForm(Request $request, $token = null) {
        return view('admins.reset-password')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function resetPassword(Request $request) {
        // Validate form input
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
        ]);
        //validate token
        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        
        // if token failed
        if(!$check_token) {
            return back()->withInput()->with('fail', 'Invalid token');
        }else{
            // if good update password
            Admin::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            // delete email in password_resets table
            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('admins.login')
                    ->with('message', 'Your password have been changed successfully!')
                    ->with('verifiedEmail', $request->email);

        }
    }

    


    public function profileEdit() {

        //get the authenticated user object
        $admin = Auth::guard('admin');

        // call view edit to show user profile
        return view('admins.edit-profile', compact('admin'));
    }

    public function profileUpdate(Request $request) {

        //get the authenticated user object
        $admin = Auth::guard('admin');
        
        // validate the request data
        $data = $request->validate([
            //using regex for unicode
            'name' => 'required|string|regex:/^[\pL\s\-\.,]+$/u|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->user()->id,
        ]);

        $admin->user()->update($data);
        // redirect back with a success message
        return redirect()->route('admins.dashboard')->withSuccess("Your Profile has been updated successfully!");
    }   
}
