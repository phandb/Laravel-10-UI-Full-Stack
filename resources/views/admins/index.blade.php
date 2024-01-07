@extends('layouts.admins.admin')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">All Candidates</h6>
          </div>
        </div>
        <div class="card-body px-1 pb-2">
          <div class="table-responsive p-0">
            <table class="table table-striped align-items-center mb-0 px-5">
              <thead>
                <tr class="ps-auto">
                  <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">#</th>
                  <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7 ">Saint Name</th>
                  <th class="text-uppercase text-secondary text-lg font-weight-bolder opacity-7">Name</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> --}}
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($candidates as $candidate)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $candidate->canSaintName }} </td>
                    <td >{{ $candidate->candidateFullName() }} </td>
                  
                    <td class="align-middle">
                      <i class="fa fa-edit me-sm-1"></i>
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
