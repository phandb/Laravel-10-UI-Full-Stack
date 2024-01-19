@extends('layouts.admins.admin')

@section('title', 'Confirmation | Change Password')

@section('content')
<div class="container mt-5 mb-8 pt-5 pb-15">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
               

                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Change Password') }}</h4>
                        @if (session('status'))
                            <h6 class=" text-white  text-center mt-2 mb-0" role="alert">
                                {{ session('status') }}
                            </h6>
                        @endif
                    </div>
                
                </div>

                

                <div class="card-body">

                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <form method="POST" action="{{ route('admin-password.update') }}">
                        @csrf
                        {{-- @method('PUT')  --}}

                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                        <div class="row mb-3">
                            <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                            <div class="col-md-6">
                                <input id="current_password" type="password" 
                                    class="form-control @error('current_password') is-invalid @enderror" 
                                    name="current_password" value="{{ $password ?? old('password') }}" 
                                    required autocomplete="current_password" autofocus>

                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control 
                                    @error('new_password') is-invalid @enderror" 
                                    name="new_password" required autocomplete="new_password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" 
                                    class="form-control" name="new_password_confirmation" 
                                    required autocomplete="new_password_confirmation">
                                @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-md-4 offset-md-4 d-inline">
                                <button type="submit" class="btn bg-gradient-primary  d-inline">
                                    {{ __('Update') }}
                                </button>
                                <a href=" {{ route('admins.dashboard') }}" type="cancel" class="btn bg-gradient-dark ms-2">{{ __('Back') }}</a>
                            </div>

                           
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
