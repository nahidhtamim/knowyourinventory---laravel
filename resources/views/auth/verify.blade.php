@extends('layouts.auth-layout')

@section('auth_content')

<!-- Verify Start -->
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-6 col-xl-6">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="text-center mb-3">
                    <h3 class="text-primary">
                        <a href="{{ url('/') }}" class=""><i class="fa fa-hashtag me-2"></i>Know Your Inventory</a>
                    </h3>
                    <hr>
                    <h3>{{ __('Verify Your Email Address') }}</h3>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
<!-- Verify End -->

@endsection
