@extends('layouts.admin')
@section('title')
Admin Dashboard | Know Your Inventory
@endsection
@section('admin_content')
<div class="container-fluid pt-2">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1>Dashboard</h1>
                    <hr>
                    <div class="color_info">

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon3" style="padding: 10px; color: #FFF; background-color: {{$color->data}}">{{$color->item}}: {{$color->data}}</span>
                                </div>
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#textModal">Update</button>
                            </div>
                            <div class="modal fade" id="textModal" tabindex="-1" aria-labelledby="textModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content bg-light">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="textModalLabel">Update Color</h5>
                                            <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('update.color', ['id' => $color->id] )}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="data" class="form-label"><b>Select Color</b> <br></label>
                                                            <input type="color" name="data" class="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group text-right">
                                                    <input type="submit" value="Save" class="btn btn-success">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
