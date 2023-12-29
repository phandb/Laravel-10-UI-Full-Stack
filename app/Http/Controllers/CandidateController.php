<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
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
            'baptismForm' => 'nullable',
            'filePath' => 'nullable',
            'dadFirstName' => 'required',
            'dadLastName' => 'required',
            'dadPhone' => 'nullable',
            'momFirstName' => 'required',
            'momLastName' => 'required',
            'momPhone' => 'nullable',
            'sponFirstName' => 'required',
            'sponLastName' => 'required',
        ]);
        $candidate->update($data);

        return redirect(route('candidates.index'))->with(['success' => 'Candidate info updated successfully']);
        
        
    }
       

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
