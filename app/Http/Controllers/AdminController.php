<?php

namespace App\Http\Controllers;


use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

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
        return redirect()->back()->with(['error' => 'error logging in']);
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
            'canFirstName' => 'required',
            'canMiddleName' => 'required',
            'canLastName' => 'required',
            'canSaintName' => 'required',
            'dateOfBirth' => 'required',
            'address' => 'nullable',       
            'email' => 'nullable',
            'is_baptized_at_HVMCC' => 'nullable',
            'baptizedYear' => 'nullable',
            //'baptismForm' => 'nullable',
            'file' => 'nullable|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
            'dadFirstName' => 'required',
            'dadLastName' => 'required',
            'dadPhone' => 'nullable',
            'momFirstName' => 'required',
            'momLastName' => 'required',
            'momPhone' => 'nullable',
            'sponFirstName' => 'required',
            'sponLastName' => 'required',
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
        
        return redirect()->back()->with('status', 'Candidate information updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
