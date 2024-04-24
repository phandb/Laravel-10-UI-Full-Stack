@extends('layouts.admins.admin')

@section('title', 'Confirmation | Admin Profile')

@section('content')
<div class="container my-auto mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
               

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Update Profile') }}</h4>
                        @if (session('success'))
                            <h6 class=" text-white  text-center mt-2 mb-0" role="alert">
                                {{ session('success') }}
                            </h6>
                        @endif
                    </div>
                
                </div>

                
                

                <div class="card-body">
                    <form method="POST" action="{{ route('admin-profile.update') }}">
                        @csrf
                        {{-- @method('PUT')   --}}

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" value="{{ $admin->user()->name ?? old('name') }}" 
                                    required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                    class="form-control" name="email" 
                                    value="{{ $admin->user()->email ?? old('email') }}" 
                                    required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4 offset-md-4 d-inline">
                                <button type="submit" class="btn bg-gradient-primary  d-inline">
                                    {{ __('Update Profile') }}
                                </button>
                                <a href=" {{ route('admins.dashboard') }}" type="cancel" class="btn bg-gradient-dark ms-2">{{ __('Cancel') }}</a>
                            </div>

                           
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
