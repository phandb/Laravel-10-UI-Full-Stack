@extends('layouts.app')

@section('content')
  <div class="container ">
      <div class="row justify-content-center">
        <div class="card">
            <div class="table-responsive">
              <table class="table  table-striped align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-primary opacity-7">#</th>
                    <th class="text-primary text-xxl font-weight-bolder ">Saint Name</th>
                    <th class="text-primary text-xxl font-weight-bolder ">Full Name</th>
                    <th class="text-primary text-xxl font-weight-bolder ">Action</th>
                    
                    
                  </tr>
                </thead>
                <tbody>

                  @foreach ($candidates as $candidate)
                  <tr>
                    <td scope="row">{{ $loop->iteration }} </td>
                    <td> {{ $candidate->canSaintName }}  </td>
                    <td> {{ $candidate->candidateFullName() }}  </td>
                    <td class="">
                      <a class="btn btn-sm btn-outline-success" href="{{ route('candidates.edit', $candidate->id) }}"><i class="fa-regular fa-pen-to-square"></i>View & Edit</a>
                      {{-- <a class="btn btn-sm btn-outline-primary " href="">Edit</a> --}}
                      
                    </td>
                    
                  </tr>
                  @endforeach

                  
          
                  
                </tbody>
              </table>
            </div>
          </div>
      </div>
  </div>
@endsection
