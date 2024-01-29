@extends('layouts.app')

@section('title', 'Confirmation | Reset Password')

@section('content')
<div class="container my-auto mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">{{ __('Reset Password') }}</h4>
                        @if (session('success'))
                            <h5 class="text-white text-center mt-2 mb-0" role="alert">
                                {{ session('success') }}
                            </h5>
                        @endif
                    </div>
                
                </div>

                
                <div class="card-body">
                    

                    <form method="POST" action="{{ route('admin.password-forget-link') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <a href="{{ route('admins.login') }}" class="form-check-label mb-0 ms-3" for="rememberMe">Back to admin login</a>
                         --}}
                        <div class="d-flex flex-row justify-content-center mb-0">
                            <div class=" ">
                                <button type="submit" class=" btn bg-gradient-primary w-100 my-4 mb-2">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                
                            </div>
                            <div><a href="{{ route('admins.login') }}" class=" btn bg-gradient-secondary w-100  mx-3 my-4 mb-2" for="cancel">Back to admin login</a></div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection
