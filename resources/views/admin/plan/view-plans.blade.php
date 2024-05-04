@extends('layouts.admin')
@section('title')
Plans | Know Your Inventory
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Plans </h6>
            <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#planModal">Add New</a>
        </div>
    </div>
</div>
<!-- End -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="table-responsive">
            @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @elseif(session('warning'))
            <div class="alert alert-danger" role="alert">
                {{ session('warning') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Billing Period</th>
                            <th scope="col">Stripe Plan</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$plan->name}}</td>
                            <td>{{$plan->billing_period}}</td>
                            <td>{{$plan->stripe_plan}}</td>
                            <td>${{$plan->price * 0.01}}</td>
                            <td>{{$plan->description}}</td>
                            {{-- <td>
                                @if ($plan->status == 0)
                                <b class="text-danger">Inactive</b>
                                <a href="{{ route('active.plan', ['id' => $plan->id] )}}" class="btn btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Active">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                @else
                                <b class="text-success">Active</b>
                                <a href="{{ route('deactive.plan', ['id' => $plan->id] )}}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Inactive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td> --}}
                            <td>
                                <div class="btn-group">
                                    {{-- <a href="{{ route('edit.plan', ['id' => $plan->id] )}}" class="btn btn-warning"><i
                                            class="fa fa-pen"></i> </a></a>
                                    <a href="{{ route('delete.plan', ['id' => $plan->id] )}}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete?')"><i
                                            class="fa fa-trash"></i></a> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Add Eco System Modal -->

<div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="planModalLabel">Add Item</h5>
                <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('save.plan')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        {{-- <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="stripe_plan"> <b>Stripe Plan<span class="text-danger">*</span></b> </label>
                                <input type="text" name="stripe_plan" class="form-control @error('stripe_plan') is-invalid @enderror" placeholder="Enter Stripe Plan from Stripe Account" required>
                                <span class="text-danger">
                                    @error('stripe_plan')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br> --}}

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="name"> <b>Name<span class="text-danger">*</span></b> </label>
                                <input type="text" name="name" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Plan Name" required>
                                <span class="text-danger">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="price"> <b>Price<span class="text-danger">*</span></b> </label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Enter Plan Price" step="0.01" required>
                                <span class="text-danger">
                                    @error('price')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="billing_period"> <b>Billing Period<span class="text-danger">*</span></b> </label>
                                <select name="billing_period" class="form-select @error('price') is-invalid @enderror" id="">
                                    <option value="" selected>Select A Value</option>
                                    <option value="week">Weekly</option>
                                    <option value="month">Monthly</option>
                                    <option value="year">Yearly</option>
                                </select>
                                <span class="text-danger">
                                    @error('billing_period')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br>
                        {{-- <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="interval_count"> <b>Interval Count<span class="text-danger">*</span></b> </label>
                                <input type="number" name="interval_count" class="form-control @error('interval_count') is-invalid @enderror" placeholder="Enter Interval Count" required>
                                <span class="text-danger">
                                    @error('interval_count')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <br> --}}
                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <label for="description"> <b>Description<span class="text-danger">*</span></b> </label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description" required>
                                <span class="text-danger">
                                    @error('description')
                                        <p class="text-danger">{{$message}}</p> 
                                    @enderror
                                </span>
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


@endsection