@extends('layouts.avatar')
@section('title')
Subscription Plans | Know Your Inventory
@endsection
@section('avatar_content')
<div class="container">
	<div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

		<!-- Pricing Start -->
        <div class="container-fluid price pb-5">
            <div class="container pb-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h4 class="text-primary">Pricing Plan</h4>
                    <h1 class="display-5 mb-4">Subsciption Plans</h1>
                    <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
                    </p>
                </div>
                <div class="row g-5 justify-content-center">
                    {{-- <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-dark border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">BASIC</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">$</strong>
                                    <p class="mb-0"><span class="display-5">00</span>/mo</p>
                                </div>                        
                            </div>
                            <div class="text-start p-5">
                                <p><i class="fas fa-check text-success me-1"></i> Limited Acess Library</p>
                                <p><i class="fas fa-check text-success me-1"></i> Customer Support</p>
                                <p><i class="fas fa-check text-success me-1"></i> Pre-built Email Templates</p>
                                <p><i class="fas fa-check text-success me-1"></i> Reporting & Analytics</p>
                                <p><i class="fas fa-check text-success me-1"></i> Forms & Landing Pages</p>
                                <p><i class="fas fa-check text-success me-1"></i> A/B Testing</p>
                                <p><i class="fas fa-check text-success me-1"></i> Email Scheduling</p>
                                <p><i class="fas fa-check text-success me-1"></i> Automated Customer Journeys</p>
                                <p><i class="fas fa-times text-danger me-1"></i> Creative Assistant</p>
                                <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Role-based Access</p>
                                <button class="btn btn-light rounded-pill py-2 px-5" type="button">Get Started</button>
                            </div>
                        </div>
                    </div> --}}
					@foreach($plans as $plan)
                    <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="pice-item-offer">{{ $plan->name }}</div>
                            <div class="text-center text-primary border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">Popular</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">$</strong>
                                    <p class="mb-0"><span class="display-5">{{$plan->price * 0.01}}</span>/{{$plan->billing_period}}</p>
                                </div>                        
                            </div>
                            <div class="text-start p-5">
                                <p>{{ $plan->description }}</p>
                                <button class="btn btn-primary rounded-pill py-2 px-5" type="button"><a href="{{ route('plans.show', $plan->slug) }}" class="text-light">Purchase</a></button>
                            </div>
                        </div>
                    </div>
					@endforeach
                    {{-- <div class="col-md-6 col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="price-item bg-light rounded text-center">
                            <div class="text-center text-secondary border-bottom d-flex flex-column justify-content-center p-4" style="width: 100%; height: 160px;">
                                <p class="fs-2 fw-bold text-uppercase mb-0">Premium</p>
                                <div class="d-flex justify-content-center">
                                    <strong class="align-self-start">$</strong>
                                    <p class="mb-0"><span class="display-5">49</span>/mo</p>
                                </div>                        
                            </div>
                            <div class="text-start p-5">
                                <p><i class="fas fa-check text-success me-1"></i> Limited Acess Library</p>
                                <p><i class="fas fa-check text-success me-1"></i> Customer Support</p>
                                <p><i class="fas fa-check text-success me-1"></i> Pre-built Email Templates</p>
                                <p><i class="fas fa-check text-success me-1"></i> Reporting & Analytics</p>
                                <p><i class="fas fa-check text-success me-1"></i> Forms & Landing Pages</p>
                                <p><i class="fas fa-check text-success me-1"></i> A/B Testing</p>
                                <p><i class="fas fa-check text-success me-1"></i> Email Scheduling</p>
                                <p><i class="fas fa-check text-success me-1"></i> Automated Customer Journeys</p>
                                <p><i class="fas fa-times text-danger me-1"></i> Creative Assistant</p>
                                <p class="mb-4"><i class="fas fa-times text-danger me-1"></i> Role-based Access</p>
                                <button class="btn btn-light rounded-pill py-2 px-5" type="button">Get Started</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Pricing End -->
	</div>
</div>
@endsection