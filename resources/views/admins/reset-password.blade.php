@extends('layouts.app')

@section('title', 'Confirmation | Reset password')

@section('content')
<div class="container">


    
    <div class="container my-auto mb-2">
        <div class="row">
          <div class=" col-md-6 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
                  @if (session('success'))
                            <h6 class=" text-white text-info text-center mt-2 mb-0" role="alert">
                                {{ session('success') }}
                            </h6>
                        @endif
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('admin.password-reset') }}" role="form" >
                  @csrf

                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control " 
                            name="email" 
                            value="{{ $email ?? old('email') }}" 
                            
                            autofocus>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control " 
                            name="password" 
                            value="{{ old('password') }}" 
                            
                            autofocus>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Password Confirm') }}</label>

                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control " 
                            name="password_confirmation" 
                            value="{{  old('password_confirmation') }}" 
                            
                            autofocus>
                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  

                 

                  {{-- <div class="form-check form-switch d-flex align-items-center mb-3">
                   
                    <a href="{{ route('admins.login') }}" class="form-check-label mb-0 ms-3" for="rememberMe">Login</a>

                  </div> --}}


                  <div class="text-center">
                    <button name="submit" type="submit" class="btn bg-gradient-primary w-50 my-4 mb-2">Save</button>
                  </div>
                  {{-- <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


</div>
@endsection
