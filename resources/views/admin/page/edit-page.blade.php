@extends('layouts.admin')
@section('title')
Edit Page | Know Your Inventory
@endsection
@section('admin_content')


<!-- blog Heading -->
<div class="text-center">
    <h1 class="h3 mb-0 text-gray-800 text-center" >Edit Page</h1>
</div>
<hr>
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<!-- Content Row -->
<div class="row">
    <div class="col-10 m-auto">
        <!-- DataTales Example -->
        <div class="card bg-light shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Page Item</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('update.page', ['id' => $page->id] )}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$page->name}}" required>
                        <span class="text-danger">
                            @error('name')
                                <p class="text-danger">{{$message}}</p> 
                            @enderror
                        </span>
                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="description"> <b>Description<span class="text-danger">*</span></b> </label>
                            <textarea name="description" class="form-control description @error('description') is-invalid @enderror" id="description" cols="30" rows="5" required>{{$page->description}}</textarea>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span>
                            {{-- <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$page->description}}" required>
                            <span class="text-danger">
                                @error('description')
                                    <p class="text-danger">{{$message}}</p> 
                                @enderror
                            </span> --}}
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="meta_tag"> <b>MetaTags<span class="text-danger">*</span></b> </label>
                        <input type="text" name="meta_tag" class="form-control" value="{{$page->meta_tag}}" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="image"> <b>Image</b> <sup>[Size: To maintain the design, please use image of same
                                size
                                ]</sup></label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <br>
                        <img src="{{asset('upload/page/'.$page->image)}}" alt="" height="150px" width="220px">
                    </div>
                    <br>
                    <div class="form-group text-right">
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
