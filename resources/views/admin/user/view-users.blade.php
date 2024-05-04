@extends('layouts.admin')
@section('title')
Users | Know Your Inventory
@endsection
@section('admin_content')


<!-- Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row vh-20 bg-light rounded align-items-center justify-content-center mx-0">
        <div class="d-flex align-items-center justify-content-between my-4">
            <h3 class="mb-0">Users </h6>
            {{-- <a href="" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#userModal">Add New</a> --}}
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
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Password Reset</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->is_admin == 1)
                                <span class="text-danger">Admin</span>
                                @else
                                <span class="text-dark">Customer</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->status == 0)
                                <b class="text-danger">Inactive</b>
                                @if($user->is_admin != 1)
                                <a href="{{ route('active.user', ['id' => $user->id] )}}" class="btn btn-success btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Active">
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </a>
                                @endif
                                @else
                                <b class="text-success">Active</b>

                                @if($user->is_admin != 1)
                                <a href="{{ route('deactive.user', ['id' => $user->id] )}}" class="btn btn-warning btn-sm"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark Inactive">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                                @endif
                                @endif
                            </td>
                            <td>
                                @if($user->is_admin != 1)
                                <div class="btn-group">
                                    <a href="{{ route('reset.user.password', ['id' => $user->id] )}}" class="btn btn-warning" onclick="return confirm('Are you sure to reset this user\'s password?')"><i
                                            class="fa fa-sync"></i> </a></a>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection