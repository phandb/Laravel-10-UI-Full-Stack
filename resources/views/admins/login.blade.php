@extends('layouts.app')

@section('content')
<div class="container">


    
    <div class="container my-auto mb-2">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  @if (session('message'))
                            <h6 class=" text-white  text-center mt-2 mb-0" role="alert">
                                {{ session('message') }}
                            </h6>
                        @endif
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('admins.check-login') }}" role="form" >
                  @csrf
                  <div class="input-group input-group-outline my-3 form-floating">
                    
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ Session::get('verifiedEmail') ? Session::get('verfiedEmail') : old('email') }}" 
                            required autocomplete="email" 
                            autofocus>
                    <label class="form-label">Email</label>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="input-group input-group-outline mb-3 form-floating">
                    
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" 
                           required autocomplete="current-password">
                    <label class="form-label">Password</label>

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                    <a href="{{ route('admin.password-forget-form') }}" class="form-check-label mb-0 ms-3" for="rememberMe">Forgot your password?</a>

                  </div>


                  <div class="text-center">
                    <button name="submit" type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
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
