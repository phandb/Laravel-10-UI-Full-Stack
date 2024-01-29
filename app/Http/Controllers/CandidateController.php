<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CandidateController extends Controller
{
    // constructor checks for auth to use the controller methods
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
        $candidate = Candidate::find($id);

       
        //string|regex:/^[\pL\s\-\.,]+$/u

        $data = $request->validate([
            'canFirstName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'canMiddleName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'canLastName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'canSaintName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'dateOfBirth' => 'required',
            'address' => 'nullable',       
            'email' => 'nullable',
            'is_baptized_at_HVMCC' => 'nullable',
            'baptizedYear' => 'nullable',
            //'baptismForm' => 'nullable',
            'filePath' => 'nullable|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
            'dadFirstName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'dadLastName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'dadPhone' => 'nullable',
            'momFirstName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'momLastName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'momPhone' => 'nullable',
            'sponFirstName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
            'sponLastName' => 'required|string|regex:/^[\pL\s\-\.,]+$/u',
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

       
        //dd($candidate);

        // 'canFirstName',
        // 'canMiddleName',
        // 'canLastName',
        // 'canSaintName',
        // 'dateOfBirth',
        // 'address',       
        // 'email',
        // 'is_baptized_at_HVMCC',
        // 'baptizedYear',
        // 'baptismForm',
        // 'filePath',
        // 'dadFirstName',
        // 'dadLastName',
        // 'dadPhone',
        // 'momFirstName',
        // 'momLastName',
        // 'momPhone',
        // 'sponFirstName',
        // 'sponLastName',

       //return redirect(route('candidates.index'))->with(['success' => 'Candidate info updated successfully']);
        
        return redirect()->back()->with('status', 'Candidate information updated successfully.');
    }
   
}
