@extends('layouts.auth-layout')
@section('title')
Login | Know Your Inventory
@endsection
@section('auth_content')

<!-- Sign In Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="{{ url('/') }}" class="">
                        <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Know Your Inventory</h3>
                    </a>
                    <h3>{{ __('Login') }}</h3>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="floatingInput">{{ __('Email Address') }}</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="floatingPassword">{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">{{ __('Login') }}</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="{{ route('register') }}">{{ __('Register') }}</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Sign In End -->

@endsection
