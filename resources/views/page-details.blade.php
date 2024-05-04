@extends('layouts.avatar')
@section('title')
{{$page->name}} | Know Your Inventory
@endsection
@section('avatar_content')

    
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-3" style="">{{$page->name}}</h1>
            </div>
        </div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="col-lg-12 mx-auto py-5 mb-5">
            {!! $page->description !!}

            <img class="img-fluid" src="{{asset('upload/page/'.$page->image)}}"  alt="" style="width: 60%; border-radius: 12px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;">
        </div>
    </div>
</div>
    
@endsection
