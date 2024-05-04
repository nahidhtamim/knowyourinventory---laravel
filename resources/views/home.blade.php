@extends('layouts.avatar')
@section('title')
Templates | Know Your Inventory
@endsection
@section('avatar_content')

<style>
    .template-card{
        transition: all 1s;
        box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; 
        text-align: center;
        border-radius: 12px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .template-card .card-inner{
        height: 100%;
        padding: 5rem 0px;
        background: #ffffffe8;
        border-radius: 12px;
    }

    .template-card h3 a{
        color: #000 !important;
    }
    
    .template-card:hover{
        transform: scale(1.1);
    }
</style>

<div class="container">
    <div class="row">
        

        <!-- Service Start -->
        <div class="container-fluid service">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                    <h1 class="display-5 mb-4">Templates</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach($templates as $temp)
                    <div class="col-md-6 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item text-center rounded p-4">
                            <div class="service-icon d-inline-block bg-light rounded p-4 mb-4">
                                <img src="{{asset('upload/template/'.$temp->image)}}" alt="" width="100%">
                            </div>
                            <div class="service-content">
                                <h4 class="mb-4">{{$temp->name}}</h4>
                                <p class="mb-4">{!!$temp->description!!}</p>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-secondary py-2 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal{{$temp->id}}">Demo</a>
                                    @if($subscribed && $subscription != null)
                                    <a href="{!!$temp->link!!}" class="btn btn-primary text-dark py-2 px-4" style=""><b>New</b></a>
                                    @endif
                                    @if(count($notSubscribed) >= 1)
                                    <a href="{{ route('records') }}" class="btn @if($subscribed && $subscription != null) btn-secondary @else btn-warning @endif py-2 px-4">Saved</a>
                                    @endif
                                </div>
                                

                                <div class="modal fade" id="exampleModal{{$temp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title display-5" id="exampleModalLabel">{{$temp->name}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <video controls height="350px" style="width: 100%; box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 8px">
                                                <source src="{{asset('upload/template/'.$temp->demo_video)}}">
                                            </video>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Service End -->
    
    
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-1 text-primary">Profit Path</h1>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-danger" role="alert">
            {{ session('warning') }}
        </div>
        @endif
    
        @if($subscribed && $subscription != null)
        <div class="col-12 mb-5 text-center">
            <p>
                You are currently subscribed to - <span class="text-success">{{$subscription->plan_inf->name}} [${{ number_format($subscription->plan_inf->price * 0.01, 2) }} / {{$subscription->plan_inf->billing_period}}]</span> 
                <form action="{{route('subscription.cancel')}}" method="GET">
                    @csrf
                    <input type="hidden" name="subscriptionName" value="{{$subscription->name}}">
                    &nbsp;<button type="submit" class="btn btn-secondary">Cancel</button>
                </form>
            </p>
        </div>
        @else
        <div class="col-12 mb-5 text-center">
            <p>
                <span class="text-danger">You are currently not subscribed. </span> 
                <a href="{{url('/plans')}}" class="btn btn-primary text-white me-3" type="button">See Plans</a>
               
            </p>
        </div>
        @endif
    </div>
</div>


@endsection
