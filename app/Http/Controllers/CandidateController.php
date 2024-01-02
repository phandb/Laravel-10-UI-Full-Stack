<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get candidates belong to the user
        $candidates = Candidate::where('user_id', Auth::user()->id)->get();
        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
        $candidate = Candidate::findOrFail($id);

        return view('candidates.detail')->with('candidate', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);

        return view('candidates.edit')->with('candidate', $candidate);
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
   
}
