@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
        <div class="card mt-5">
            <form enctype="multipart/form-data" 
                  method="POST" 
                  action="{{ route('candidates.update', $candidate->id) }}" 
                  class="row g-3">
                @csrf
                @method('put')
                <div class="card-header  mb-5 fw-bolder text-center fs-3">
                  Candidate Information                  
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <label for="canSaintName" class="form-label text-muted fw-lighter">Saint Name</label>
                    <input type="text" name="canSaintName" value="{{ $candidate->canSaintName }}" class="form-control fw-bolder" id="saintName">
                  </div>
                  <div class="col-md-3">
                      <label for="canLastName" class="form-label text-muted fw-lighter">Last Name</label>
                      <input type="text" name="canLastName" value="{{ $candidate->canLastName }}" class="form-control fw-bolder" id="lastName">
                  </div>
                  <div class="col-md-3">
                      <label for="canMiddleName" class="form-label text-muted fw-lighter">Middle Name</label>
                      <input type="text" name="canMiddleName" value="{{ $candidate->canMiddleName }}" class="form-control fw-bolder" id="middleName">
                  </div>
                  <div class="col-md-3">
                      <label for="canFirstName" class="form-label text-muted fw-lighter">First Name</label>
                      <input type="text" name="canFirstName" value="{{ $candidate->canFirstName }}" class="form-control fw-bolder" id="firstName">
                  </div>
                </div>
                
                <div class="row mt-5">
                  <div class="col-3">
                    <label for="dateOfBirth" class="form-label text-muted fw-lighter">Date of Birth (YYYY/M/D)</label>
                    <input type="text" name="dateOfBirth" value="{{ $candidate->dateOfBirth }}" class="form-control fw-bolder" >
                  </div>

                  <div class="col-2">
                    <label for="age" class="form-label text-muted fw-lighter">Age</label>
                    <input type="text" name="age" value="{{ $candidate->getAge() }}" class="form-control fw-bolder" >
                  </div>
  
                  <div class="col-6">
                    <label for="address" class="form-label text-muted fw-lighter">Address</label>
                    <input type="text" name="address" value="{{ $candidate->address }}" class="form-control fw-bolder" >
                  </div>

                </div>
                
                <div class="row mt-5">
                  <div class="col-2">
                    <label for="is_Baptized_At_HVMCC" class="form-label text-muted fw-lighter">Baptized at HVMCC</label>
                    <input type="text" name="is_Baptized_At_HVMCC" value="{{ ($candidate->is_baptized_at_HVMCC === 0 ) ? 'No' : 'Yes' }}" class="form-control fw-bolder" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="col-2">
                    <label for="baptismYear" class="form-label text-muted fw-lighter">Year of Baptism</label>
                    <input type="text" name="baptizedYear" value="{{ $candidate->baptizedYear }}"class="form-control fw-bolder" >
                  </div>
  
                  <div class="col-6">
                    <label for="baptismForm" class="form-label text-muted fw-lighter">Baptism Form</label>
                    <input type="text" name="baptismForm" value="{{ $candidate->baptismForm}}"class="form-control fw-bolder" >
                  </div>

                </div>
                <div class="row mt-5">
                 
                  <div class="col-6">
                    <label for="filePath" class="form-label text-muted fw-lighter">Upload File (jpeg, jpg, png, pdf, docx)
                      <span class="text-muted">(Please upload a baptism form if your child was not baptized at the HVMCC)</span>
                    </label>
                    <input type="file" name="file" class="form-control " id="file" placeholder="jpeg, jpg, png, pdf, docx">
                    
                  </div>
                  
                </div>

                <div class="card-header mt-5 mb-5 fw-bolder text-center fs-3">
                  Parents Information                  
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <label for="dadLastName" class="form-label text-muted fw-lighter">Father Last Name</label>
                    <input type="text" name="dadLastName" value="{{ $candidate->dadLastName }}" class="form-control fw-bolder" >
                  </div>
                  
                  <div class="col-md-4">
                      <label for="dadFirstName" class="form-label text-muted fw-lighter">Father First Name</label>
                      <input type="text" name="dadFirstName" value="{{ $candidate->dadFirstName }}" class="form-control fw-bolder" >
                  </div>
  
                  <div class="col-md-4">
                    <label for="dadPhone" class="form-label text-muted fw-lighter">Father Phone Number</label>
                    <input type="text" name="dadPhone" value="{{ $candidate->dadPhone }}" class="form-control fw-bolder" >
                  </div>
                </div>
                

                <div class="row mt-5">
                  <div class="col-md-4">
                    <label for="momLastName" class="form-label text-muted fw-lighter">Mother Last Name</label>
                    <input type="text" name="momLastName" value="{{ $candidate->momLastName }}" class="form-control fw-bolder" >
                  </div>
                
                  <div class="col-md-4">
                      <label for="momFirstName" class="form-label text-muted fw-lighter">Mother First Name</label>
                      <input type="text" name="momFirstName" value="{{ $candidate->momFirstName }}" class="form-control fw-bolder" >
                  </div>
  
                  <div class="col-md-4">
                      <label for="momPhone" class="form-label text-muted fw-lighter">Mother Phone Number</label>
                      <input type="text" name="momPhone" value="{{ $candidate->momPhone }}" class="form-control fw-bolder" >
                  </div>
                </div>
                

                <div class="card-header mt-5 mb-5 fw-bolder text-center fs-3">
                  Sponsor Information                  
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <label for="sponLastName" class="form-label text-muted fw-lighter">Sponsor Last Name</label>
                    <input type="text" name="sponLastName" value="{{ $candidate->sponLastName }}" class="form-control fw-bolder" >
                  </div>
              
                  <div class="col-md-4">
                      <label for="sponFirstName" class="form-label text-muted fw-lighter">Sponsor First Name</label>
                      <input type="text" name="sponFirstName" value="{{ $candidate->sponFirstName }}" class="form-control fw-bolder" >
                  </div>
                </div>
                
                
            
                <div class="row justify-content-md-center  mt-5 mb-3">
                  <hr>
                  <button type="submit" class="btn btn-outline-primary col col-md-2 m-2">Update & Save</button>
                  <button type="cancel" class="btn btn-outline-danger  col col-md-2 m-2">Cancel</button>
                </div>

            </form>
            
        </div>
      </div>
  </div>
@endsection
