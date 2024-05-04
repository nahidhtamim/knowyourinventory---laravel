@extends('layouts.avatar')
@section('title')
Edit {{$dailyUpdateData->title}} - Daily Sales Update | Know Your Inventory
@endsection
@section('avatar_content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

{{-- Assuming $dailyUpdate is the model instance --}}
@php
    $goals = json_decode($dailyUpdateData->goals, true);
    $days = json_decode($dailyUpdateData->day, true);
    $name_one_sales = json_decode($dailyUpdateData->name_one_sales, true);
    $name_one_inv = json_decode($dailyUpdateData->name_one_inv, true);
    $name_one_lines = json_decode($dailyUpdateData->name_one_lines, true);
    $name_two_sales = json_decode($dailyUpdateData->name_two_sales, true);
    $name_two_inv = json_decode($dailyUpdateData->name_two_inv, true);
    $name_two_lines = json_decode($dailyUpdateData->name_two_lines, true);
    $name_three_sales = json_decode($dailyUpdateData->name_three_sales, true);
    $name_three_inv = json_decode($dailyUpdateData->name_three_inv, true);
    $name_three_lines = json_decode($dailyUpdateData->name_three_lines, true);
    $name_four_sales = json_decode($dailyUpdateData->name_four_sales, true);
    $name_four_inv = json_decode($dailyUpdateData->name_four_inv, true);
    $name_four_lines = json_decode($dailyUpdateData->name_four_lines, true);


    $mo_total_goal = json_decode($dailyUpdateData->mo_total_goal, true);
    $mo_total_sales = json_decode($dailyUpdateData->mo_total_sales, true);
    $mo_total_inv = json_decode($dailyUpdateData->mo_total_inv, true);
    $mo_total_lines = json_decode($dailyUpdateData->mo_total_lines, true);
    $mo_total_LPI = json_decode($dailyUpdateData->mo_total_LPI, true);
    $mo_total_dlr_inv = json_decode($dailyUpdateData->mo_total_dlr_inv, true);

    $mo_name_one_sales = json_decode($dailyUpdateData->mo_name_one_sales, true);
    $mo_name_one_inv = json_decode($dailyUpdateData->mo_name_one_inv, true);
    $mo_name_one_lines = json_decode($dailyUpdateData->mo_name_one_lines, true);
    $mo_name_one_LPI = json_decode($dailyUpdateData->mo_name_one_LPI, true);
    $mo_name_one_dlr_inv = json_decode($dailyUpdateData->mo_name_one_dlr_inv, true);
    $mo_name_two_sales = json_decode($dailyUpdateData->mo_name_two_sales, true);
    $mo_name_two_inv = json_decode($dailyUpdateData->mo_name_two_inv, true);
    $mo_name_two_lines = json_decode($dailyUpdateData->mo_name_two_lines, true);
    $mo_name_two_LPI = json_decode($dailyUpdateData->mo_name_two_LPI, true);
    $mo_name_two_dlr_inv = json_decode($dailyUpdateData->mo_name_two_dlr_inv, true);
    $mo_name_three_sales = json_decode($dailyUpdateData->mo_name_three_sales, true);
    $mo_name_three_inv = json_decode($dailyUpdateData->mo_name_three_inv, true);
    $mo_name_three_lines = json_decode($dailyUpdateData->mo_name_three_lines, true);
    $mo_name_three_LPI = json_decode($dailyUpdateData->mo_name_three_LPI, true);
    $mo_name_three_dlr_inv = json_decode($dailyUpdateData->mo_name_three_dlr_inv, true);
    $mo_name_four_sales = json_decode($dailyUpdateData->mo_name_four_sales, true);
    $mo_name_four_inv = json_decode($dailyUpdateData->mo_name_four_inv, true);
    $mo_name_four_lines = json_decode($dailyUpdateData->mo_name_four_lines, true);
    $mo_name_four_LPI = json_decode($dailyUpdateData->mo_name_four_LPI, true);
    $mo_name_four_dlr_inv = json_decode($dailyUpdateData->mo_name_four_dlr_inv, true);

    $daily_retail = json_decode($dailyUpdateData->daily_retail, true);
    $daily_ly1 = json_decode($dailyUpdateData->daily_ly1, true);
    $daily_cost = json_decode($dailyUpdateData->daily_cost, true);
    $daily_margin = json_decode($dailyUpdateData->daily_margin, true);
    $daily_sales_goal = json_decode($dailyUpdateData->daily_sales_goal, true);
    $daily_ou1 = json_decode($dailyUpdateData->daily_ou1, true);
    $daily_current = json_decode($dailyUpdateData->daily_current, true);
    $daily_ly2 = json_decode($dailyUpdateData->daily_ly2, true);
    $daily_goal = json_decode($dailyUpdateData->daily_goal, true);
    $daily_ou2 = json_decode($dailyUpdateData->daily_ou2, true);
@endphp

<style>
    td {
        min-width: 40px;
    }

    .collapseThree .input-group-text{
        font-size: 12px !important
    }

    .table.table-bordered.table-condensed input.form-control,
    .table.table-bordered.table-condensed select.form-select {
        min-width: 120px;
        font-size: 10px !important
    }

</style>
<div class="row">
    <form action="{{ route('update.daily.update', ['id' => $dailyUpdateData->id] )}}" method="POST" id="dataEntryForm">
        @csrf
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-3">Daily Sales Update</h1>
            </div>
        </div>
        <div class="col-12 text-center">
            <div class="py-5">
                <label for="title">Month</label>
                <input type="text" class="form-control" name="title" value="{{$dailyUpdateData->title}}" required>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Monthly Goal
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                        <div class="accordion-body">
                            <div class="container">
                                <h3 class="text-center">Name & Sales Goal</h3>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_one" name="name_one"
                                        value="{{$dailyUpdateData->name_one}}">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_one"
                                            name="amount_one" value="{{$dailyUpdateData->amount_one}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_two" name="name_two"
                                            value="{{$dailyUpdateData->name_two}}">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_two"
                                            name="amount_two" value="{{$dailyUpdateData->amount_two}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_three" name="name_three"
                                            value="{{$dailyUpdateData->name_three}}">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_three"
                                            name="amount_three" placeholder="{{$dailyUpdateData->amount_three}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_four" name="name_four"
                                            value="{{$dailyUpdateData->name_four}}">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_four"
                                            name="amount_four" placeholder="{{$dailyUpdateData->amount_four}}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Total</span>
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control total_amount"
                                            name="total_amount" placeholder="{{$dailyUpdateData->total_amount}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Input
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th rowspan="2">Goals</th>
                                            <th rowspan="2">Day</th>
                                            <th rowspan="2">Date</th>
                                            <th colspan="3"><input type="text" name="name_one_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_one_output}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_two_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_two_output}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_three_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_three_output}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_four_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_four_output}}" readonly></th>
                                        </tr>
                                        <tr>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Loop through days to display input fields --}}
                                        @for ($day = 1; $day <= 31; $day++)
                                        <tr>
                                                <td><input type="text" class="form-control" name="goals_{{ $day }}"
                                                        value="{{ $goals[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="day_{{ $day }}" value="{{ $days[$day] ?? '' }}">
                                                </td>
                                                <td><input type="number" class="form-control" name="date_{{ $day }}" value="{{ $day }}"
                                                        readonly></td>
                                                
                                                <td><input type="text" class="form-control" name="name_one_sales_{{ $day }}"
                                                        value="{{ $name_one_sales[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_one_inv_{{ $day }}"
                                                        value="{{ $name_one_inv[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_one_lines_{{ $day }}"
                                                        value="{{ $name_one_lines[$day] ?? '' }}"></td>
                                                
                                                <td><input type="text" class="form-control" name="name_two_sales_{{ $day }}"
                                                        value="{{ $name_two_sales[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_two_inv_{{ $day }}"
                                                        value="{{ $name_two_inv[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_two_lines_{{ $day }}"
                                                        value="{{ $name_two_lines[$day] ?? '' }}"></td>
                                                
                                                <td><input type="text" class="form-control" name="name_three_sales_{{ $day }}"
                                                        value="{{ $name_three_sales[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_three_inv_{{ $day }}"
                                                        value="{{ $name_three_inv[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_three_lines_{{ $day }}"
                                                        value="{{ $name_three_lines[$day] ?? '' }}"></td>
                                                
                                                <td><input type="text" class="form-control" name="name_four_sales_{{ $day }}"
                                                        value="{{ $name_four_sales[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_four_inv_{{ $day }}"
                                                        value="{{ $name_four_inv[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="name_four_lines_{{ $day }}"
                                                        value="{{ $name_four_lines[$day] ?? '' }}"></td>
                                            </tr>
                                        @endfor

                                    </tbody>
                                    <tfoot>
                                        <tr style="font-weight: bold">
                                            <td><input type="text" class="form-control" name="goals_sum"
                                                    value="{{$dailyUpdateData->goals_sum}}"></td>
                                            <td><input type="text" class="form-control" name="day_sum" value="{{$dailyUpdateData->day_sum}}">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_sum" value="{{$dailyUpdateData->date_sum}}"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_sum"
                                                    value="{{$dailyUpdateData->name_one_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_sum"
                                                    value="{{$dailyUpdateData->name_one_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_sum"
                                                    value="{{$dailyUpdateData->name_one_lines_sum}}"></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_sum"
                                                    value="{{$dailyUpdateData->name_two_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_sum"
                                                    value="{{$dailyUpdateData->name_two_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_sum"
                                                    value="{{$dailyUpdateData->name_two_lines_sum}}"></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_sum"
                                                    value="{{$dailyUpdateData->name_three_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_sum"
                                                    value="{{$dailyUpdateData->name_three_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_sum"
                                                    value="{{$dailyUpdateData->name_three_lines_sum}}"></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_sum"
                                                    value="{{$dailyUpdateData->name_four_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_sum"
                                                    value="{{$dailyUpdateData->name_four_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_sum"
                                                    value="{{$dailyUpdateData->name_four_lines_sum}}"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Month Overview
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th colspan="7">Total Department</th>
                                            <th colspan="6"><input type="text" name="name_one_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" value="{{$dailyUpdateData->name_one}}" readonly></th>
                                            <th colspan="6"><input type="text" name="name_two_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" value="{{$dailyUpdateData->name_two}}" readonly></th>
                                            <th colspan="6"><input type="text" name="name_three_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" value="{{$dailyUpdateData->name_three}}" readonly></th>
                                            <th colspan="6"><input type="text" name="name_four_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" value="{{$dailyUpdateData->name_four}}" readonly></th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Goal</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>LPI</th>
                                            <th>$/INV</th>
                                            <th>#</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>LPI</th>
                                            <th>$/INV</th>
                                            <th>#</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>LPI</th>
                                            <th>$/INV</th>
                                            <th>#</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>LPI</th>
                                            <th>$/INV</th>
                                            <th>#</th>
                                            <th>Sales</th>
                                            <th>INV</th>
                                            <th>Lines</th>
                                            <th>LPI</th>
                                            <th>$/INV</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Day 1  --}}

                                        @for ($day = 1; $day <= 31; $day++)

                                                <tr>
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_total_goal_{{$day}}"
                                                                value="{{ $mo_total_goal[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_total_sales_{{$day}}"
                                                                value="{{ $mo_total_sales[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_total_inv_{{$day}}"
                                                                value="{{ $mo_total_inv[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_total_lines_{{$day}}"
                                                                value="{{ $mo_total_lines[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_total_LPI_{{$day}}"
                                                                value="{{ $mo_total_LPI[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_total_dlr_inv_{{$day}}"
                                                                value="{{ $mo_total_dlr_inv[$day] ?? '' }}"></td>
                                                
                                                
                                                        
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_sales_{{$day}}"
                                                                value="{{ $mo_name_one_sales[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_inv_{{$day}}"
                                                                value="{{ $mo_name_one_inv[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_lines_{{$day}}"
                                                                value="{{ $mo_name_one_lines[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_LPI_{{$day}}"
                                                                value="{{ $mo_name_one_LPI[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_one_dlr_inv[$day] ?? '' }}"></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_sales_{{$day}}"
                                                                value="{{ $mo_name_two_sales[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_inv_{{$day}}"
                                                                value="{{ $mo_name_two_inv[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_lines_{{$day}}"
                                                                value="{{ $mo_name_two_lines[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_LPI_{{$day}}"
                                                                value="{{ $mo_name_two_LPI[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_two_dlr_inv[$day] ?? '' }}"></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_sales_{{$day}}"
                                                                value="{{ $mo_name_three_sales[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_inv_{{$day}}"
                                                                value="{{ $mo_name_three_inv[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_lines_{{$day}}"
                                                                value="{{ $mo_name_three_lines[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_LPI_{{$day}}"
                                                                value="{{ $mo_name_three_LPI[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_three_dlr_inv[$day] ?? '' }}"></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_sales_{{$day}}"
                                                                value="{{ $mo_name_four_sales[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_inv_{{$day}}"
                                                                value="{{ $mo_name_four_inv[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_lines_{{$day}}"
                                                                value="{{ $mo_name_four_lines[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_LPI_{{$day}}"
                                                                value="{{ $mo_name_four_LPI[$day] ?? '' }}"></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_four_dlr_inv[$day] ?? '' }}"></td>
                                                </tr>

                                        @endfor

                                        
                                        {{-- Day sum  --}}
                                        <tr>
                                            <td>Sum</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_sum"
                                                    value="{{$dailyUpdateData->mo_total_goal_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_sum"
                                                    value="{{$dailyUpdateData->mo_total_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_sum"
                                                    value="{{$dailyUpdateData->mo_total_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_sum"
                                                    value="{{$dailyUpdateData->mo_total_lines_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_total_LPI_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_total_dlr_inv_sum}}"></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_lines_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_LPI_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_dlr_inv_sum}}"></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_lines_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_LPI_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_dlr_inv_sum}}"></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_lines_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_LPI_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_dlr_inv_sum}}"></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_sales_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_inv_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_lines_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_LPI_sum}}"></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_dlr_inv_sum}}"></td>
                                        </tr>
                                    </tbody>


                                </table>
                            </div>


                            <div class="row mt-5">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">TOTAL DEPARTMENT GOAL</span>
                                            <input type="text" name="total_dept_goal" class="form-control"
                                                value="{{$dailyUpdateData->total_dept_goal}}" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">SALE</span>
                                            <input type="text" name="total_dept_sale" class="form-control"
                                                value="{{$dailyUpdateData->total_dept_sale}}" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">GOAL PACE</span>
                                            <input type="text" name="total_dept_pace" class="form-control"
                                                value="{{$dailyUpdateData->total_dept_pace}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_one_input_group">{{$dailyUpdateData->name_one}}</span>
                                                        <input type="text" name="name_one_dept_goal" class="form-control"
                                                            value="{{$dailyUpdateData->name_one_dept_goal}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_one_dept_sale" class="form-control"
                                                            value="{{$dailyUpdateData->name_one_dept_sale}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_one_dept_pace" class="form-control"
                                                            value="{{$dailyUpdateData->name_one_dept_pace}}" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_two_input_group">{{$dailyUpdateData->name_two}}</span>
                                                        <input type="text" name="name_two_dept_goal" class="form-control"
                                                            value="{{$dailyUpdateData->name_two_dept_goal}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_two_dept_sale" class="form-control"
                                                            value="{{$dailyUpdateData->name_two_dept_sale}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_two_dept_pace" class="form-control"
                                                            value="{{$dailyUpdateData->name_two_dept_pace}}" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_three_input_group">{{$dailyUpdateData->name_three}}</span>
                                                        <input type="text" name="name_three_dept_goal" class="form-control"
                                                            value="{{$dailyUpdateData->name_three_dept_goal}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_three_dept_sale" class="form-control"
                                                            value="{{$dailyUpdateData->name_three_dept_sale}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_three_dept_pace" class="form-control"
                                                            value="{{$dailyUpdateData->name_three_dept_pace}}" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_four_input_group">{{$dailyUpdateData->name_four}}</span>
                                                        <input type="text" name="name_four_dept_goal" class="form-control"
                                                            value="{{$dailyUpdateData->name_four_dept_goal}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_four_dept_sale" class="form-control"
                                                            value="{{$dailyUpdateData->name_four_dept_sale}}" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_four_dept_pace" class="form-control"
                                                            value="{{$dailyUpdateData->name_four_dept_pace}}" readonly>
                                                    </div>
                                                <hr>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-4 col-12">
                                        <h4>Sales Standing</h4>
                                        <hr>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="sales_standing_name_one" class="form-control"
                                                value="{{$dailyUpdateData->name_one}}" readonly>
                                            <input type="text" name="sales_standing_one_value" class="form-control"
                                                value="{{$dailyUpdateData->sales_standing_one_value}}">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="sales_standing_name_two" class="form-control"
                                                        value="{{$dailyUpdateData->name_two}}" readonly>
                                                <input type="text" name="sales_standing_two_value" class="form-control"
                                                value="{{$dailyUpdateData->sales_standing_two_value}}">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="sales_standing_name_three" class="form-control"
                                                    value="{{$dailyUpdateData->name_three}}" readonly>
                                                <input type="text" name="sales_standing_three_value" class="form-control"
                                                    value="{{$dailyUpdateData->sales_standing_three_value}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="sales_standing_name_four" class="form-control"
                                                            value="{{$dailyUpdateData->name_four}}" readonly>
                                                    <input type="text" name="sales_standing_four_value" class="form-control"
                                                    value="{{$dailyUpdateData->sales_standing_four_value}}">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                        <h4>$ Per Inv</h4>
                                        <hr>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="dlr_per_inv_name_one" class="form-control"
                                                value="{{$dailyUpdateData->name_one}}" readonly>
                                            <input type="text" name="dlr_per_inv_one_value" class="form-control"
                                                value="{{$dailyUpdateData->dlr_per_inv_one_value}}">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="dlr_per_inv_name_two" class="form-control"
                                                        value="{{$dailyUpdateData->name_two}}" readonly>
                                                <input type="text" name="dlr_per_inv_two_value" class="form-control"
                                                value="{{$dailyUpdateData->dlr_per_inv_two_value}}">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="dlr_per_inv_name_three" class="form-control"
                                                    value="{{$dailyUpdateData->name_three}}" readonly>
                                                <input type="text" name="dlr_per_inv_three_value" class="form-control"
                                                    value="{{$dailyUpdateData->dlr_per_inv_three_value}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="dlr_per_inv_name_four" class="form-control"
                                                            value="{{$dailyUpdateData->name_four}}" readonly>
                                                    <input type="text" name="dlr_per_inv_four_value" class="form-control"
                                                    value="{{$dailyUpdateData->dlr_per_inv_four_value}}">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                        <h4>LPI</h4>
                                        <hr>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="total_LPI_name_one" class="form-control"
                                                value="{{$dailyUpdateData->name_one}}" readonly>
                                            <input type="text" name="total_LPI_one_value" class="form-control"
                                                value="{{$dailyUpdateData->total_LPI_one_value}}">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="total_LPI_name_two" class="form-control"
                                                        value="{{$dailyUpdateData->name_two}}" readonly>
                                                <input type="text" name="total_LPI_two_value" class="form-control"
                                                value="{{$dailyUpdateData->total_LPI_two_value}}">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="total_LPI_name_three" class="form-control"
                                                    value="{{$dailyUpdateData->name_three}}" readonly>
                                                <input type="text" name="total_LPI_three_value" class="form-control"
                                                    value="{{$dailyUpdateData->total_LPI_three_value}}">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="total_LPI_name_four" class="form-control"
                                                            value="{{$dailyUpdateData->name_four}}" readonly>
                                                    <input type="text" name="total_LPI_four_value" class="form-control"
                                                    value="{{$dailyUpdateData->total_LPI_four_value}}">
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Daily
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                        <div class="accordion-body">
                            <table class="table table-bordered table-condensed table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th rowspan="3">#</th>
                                        <th colspan="4">Day</th>
                                        <th colspan="2">Daily</th>
                                        <th colspan="4">Month To Date</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Sales</th>
                                        <th rowspan="2">Sales Goal</th>
                                        <th rowspan="2">Over / Under Goal</th>
                                        <th colspan="2">Sales</th>
                                        <th rowspan="2">Goal</th>
                                        <th rowspan="2">Over (Under) Goal</th>
                                    </tr>
                                    <tr>
                                        <th>Retail</th>
                                        <th>LY</th>
                                        <th>Cost</th>
                                        <th>Margin</th>
                                        <th>Current</th>
                                        <th>LY</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Day 1  --}}
                                        @for ($day = 1; $day <= 31; $day++)
                                        <tr>
                                                <td><input type="number" class="form-control" name="daily_date_{{$day}}" value="{{$day}}"
                                                        readonly></td>
                                                <td><input type="text" class="form-control" name="daily_retail_{{$day}}"
                                                        value="{{ $daily_retail[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="daily_ly1_{{$day}}" value="{{ $daily_ly1[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="daily_cost_{{$day}}" value="{{ $daily_cost[$day] ?? '' }}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_margin_{{$day}}"
                                                        value="{{ $daily_margin[$day] ?? '' }}"></td>

                                                <td><input type="text" class="form-control" name="daily_sales_goal_{{$day}}"
                                                        value="{{ $daily_sales_goal[$day] ?? '' }}"></td>

                                                <td><input type="text" class="form-control" name="daily_ou1_{{$day}}" value="{{ $daily_ou1[$day] ?? '' }}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_current_{{$day}}"
                                                        value="{{ $daily_current[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="daily_ly2_{{$day}}" value="{{ $daily_ly2[$day] ?? '' }}">
                                                </td>

                                                <td><input type="text" class="form-control" name="daily_goal_{{$day}}" value="{{ $daily_goal[$day] ?? '' }}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_ou2_{{$day}}" value="{{ $daily_ou2[$day] ?? '' }}">
                                                </td>
                                        </tr>
                                        @endfor
                                    
                                        {{-- Day sum  --}}
                                        <tr>
                                                <td><input type="number" class="form-control" name="daily_date_sum" value="{{$dailyUpdateData->daily_date_sum}}"
                                                        readonly></td>
                                                <td><input type="text" class="form-control" name="daily_retail_sum"
                                                        value="{{$dailyUpdateData->daily_retail_sum}}"></td>
                                                <td><input type="text" class="form-control" name="daily_ly1_sum" value="{{$dailyUpdateData->daily_ly1_sum}}"></td>
                                                <td><input type="text" class="form-control" name="daily_cost_sum"
                                                        value="{{$dailyUpdateData->daily_cost_sum}}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_margin_sum"
                                                        value="{{$dailyUpdateData->daily_margin_sum}}"></td>

                                                <td><input type="text" class="form-control" name="daily_sales_goal_sum"
                                                        value="{{$dailyUpdateData->daily_sales_goal_sum}}"></td>

                                                <td><input type="text" class="form-control" name="daily_ou1_sum" value="{{$dailyUpdateData->daily_ou1_sum}}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_current_sum"
                                                        value="{{$dailyUpdateData->daily_current_sum}}"></td>
                                                <td><input type="text" class="form-control" name="daily_ly2_sum" value="{{$dailyUpdateData->daily_ly2_sum}}">
                                                </td>

                                                <td><input type="text" class="form-control" name="daily_goal_sum"
                                                        value="{{$dailyUpdateData->daily_goal_sum}}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_ou2_sum" value="{{$dailyUpdateData->daily_ou2_sum}}">
                                                </td>
                                        </tr>
                                </tbody>


                            </table>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Tracking</span>
                                            <input type="text" name="daily_tracking" class="form-control"
                                            value="{{$dailyUpdateData->daily_tracking}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual</span>
                                            <input type="text" name="daily_actual" class="form-control"
                                            value="{{$dailyUpdateData->daily_actual}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual % Of Goal</span>
                                            <input type="text" name="daily_actual_goal" class="form-control"
                                            value="{{$dailyUpdateData->daily_actual_goal}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">On Track</span>
                                            <input type="text" name="daily_on_track" class="form-control"
                                                 value="{{$dailyUpdateData->daily_on_track}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">No. of Business Days</span>
                                            <input type="text" name="daily_no_business_days" class="form-control"
                                            value="{{$dailyUpdateData->daily_no_business_days}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Above/Below On Track</span>
                                            <input type="text" name="daily_on_above_below" class="form-control"
                                                 value="{{$dailyUpdateData->daily_on_above_below}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center my-5">
                <button class="btn btn-primary px-5" type="submit">Save</button>
                <a href="{{ route('daily.update.details', ['id' => $dailyUpdateData->id] )}}"
                    class="btn btn-secondary px-5">View</a>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        // Function to calculate total amount
        function calculateTotal() {
            var amountOne = parseFloat($(".amount_one").val()) || 0;
            var amountTwo = parseFloat($(".amount_two").val()) || 0;
            var amountThree = parseFloat($(".amount_three").val()) || 0;
            var amountFour = parseFloat($(".amount_four").val()) || 0;

            var totalAmount = amountOne + amountTwo + amountThree + amountFour;

            // Update the total_amount input field
            $(".total_amount").val(totalAmount.toFixed(2));

            // Update the output fields with the corresponding names
            $("input[name='name_one_output']").val($(".name_one").val());
            $("input[name='name_two_output']").val($(".name_two").val());
            $("input[name='name_three_output']").val($(".name_three").val());
            $("input[name='name_four_output']").val($(".name_four").val());

            // Update the output fields in the <th> elements
            $("input[name='name_one_mo_output']").val($(".name_one").val());
            $("input[name='name_two_mo_output']").val($(".name_two").val());
            $("input[name='name_three_mo_output']").val($(".name_three").val());
            $("input[name='name_four_mo_output']").val($(".name_four").val());

            // Update the output fields with the corresponding names
            $(".name_one_input_group").text($(".name_one").val());
            $(".name_two_input_group").text($(".name_two").val());
            $(".name_three_input_group").text($(".name_three").val());
            $(".name_four_input_group").text($(".name_four").val());


            // Update the output fields with the corresponding names
            $("input[name='sales_standing_name_one']").val($(".name_one").val());
            $("input[name='sales_standing_name_two']").val($(".name_two").val());
            $("input[name='sales_standing_name_three']").val($(".name_three").val());
            $("input[name='sales_standing_name_four']").val($(".name_four").val());

            // Update the output fields in the <th> elements
            $("input[name='dlr_per_inv_name_one']").val($(".name_one").val());
            $("input[name='dlr_per_inv_name_two']").val($(".name_two").val());
            $("input[name='dlr_per_inv_name_three']").val($(".name_three").val());
            $("input[name='dlr_per_inv_name_four']").val($(".name_four").val());

            // Update the output fields in the <th> elements
            $("input[name='total_LPI_name_one']").val($(".name_one").val());
            $("input[name='total_LPI_name_two']").val($(".name_two").val());
            $("input[name='total_LPI_name_three']").val($(".name_three").val());
            $("input[name='total_LPI_name_four']").val($(".name_four").val());

        }

        // Function to calculate sum for a specific category and update the summary field
        function calculateCategorySum(category, numDays) {
            var sum = 0;
            for (var day = 1; day <= numDays; day++) {
                sum += parseFloat($(`[name="${category}_${day}"]`).val()) || 0;
            }
            $(`[name="${category}_sum"]`).val(sum.toFixed(2));
        }

        // Function to calculate sums for all categories
        function calculateSums(numDays) {
            calculateCategorySum("goals", numDays);
            calculateCategorySum("name_one_sales", numDays);
            calculateCategorySum("name_one_inv", numDays);
            calculateCategorySum("name_one_lines", numDays);

            calculateCategorySum("name_two_sales", numDays);
            calculateCategorySum("name_two_inv", numDays);
            calculateCategorySum("name_two_lines", numDays);

            calculateCategorySum("name_three_sales", numDays);
            calculateCategorySum("name_three_inv", numDays);
            calculateCategorySum("name_three_lines", numDays);

            calculateCategorySum("name_four_sales", numDays);
            calculateCategorySum("name_four_inv", numDays);
            calculateCategorySum("name_four_lines", numDays);
        }

        // Function to calculate sums for all categories
        function calculateMOSums(numDays) {
            var categories = ["mo_total_goal", "mo_total_sales", "mo_total_inv", "mo_total_lines",
                "mo_total_LPI", "mo_total_dlr_inv", "mo_name_one_sales", "mo_name_one_inv",
                "mo_name_one_lines", "mo_name_one_LPI", "mo_name_one_dlr_inv",
                "mo_name_two_sales", "mo_name_two_inv", "mo_name_two_lines",
                "mo_name_two_LPI", "mo_name_two_dlr_inv", "mo_name_three_sales",
                "mo_name_three_inv", "mo_name_three_lines", "mo_name_three_LPI",
                "mo_name_three_dlr_inv", "mo_name_four_sales", "mo_name_four_inv",
                "mo_name_four_lines", "mo_name_four_LPI", "mo_name_four_dlr_inv"
            ];

            categories.forEach(function (category) {
                calculateCategorySum(category, numDays);
            });
        }


        // Function to update goals based on input changes
        function updateGoals() {
                // Update individual name sale goals
                var nameOneSaleGoal = parseFloat($("input[name='amount_one']").val()) || 0;
                var nameTwoSaleGoal = parseFloat($("input[name='amount_two']").val()) || 0;
                var nameThreeSaleGoal = parseFloat($("input[name='amount_three']").val()) || 0;
                var nameFourSaleGoal = parseFloat($("input[name='amount_four']").val()) || 0;

                var nameOneSaleSum = parseFloat($("input[name='mo_name_one_sales_sum']").val()) || 0;
                var nameTwoSaleSum = parseFloat($("input[name='mo_name_two_sales_sum']").val()) || 0;
                var nameThreeSaleSum = parseFloat($("input[name='mo_name_three_sales_sum']").val()) || 0;
                var nameFourSaleSum = parseFloat($("input[name='mo_name_four_sales_sum']").val()) || 0;

                $("input[name='name_one_dept_goal']").val(nameOneSaleGoal.toFixed(2));
                $("input[name='name_two_dept_goal']").val(nameTwoSaleGoal.toFixed(2));
                $("input[name='name_three_dept_goal']").val(nameThreeSaleGoal.toFixed(2));
                $("input[name='name_four_dept_goal']").val(nameFourSaleGoal.toFixed(2));

                $("input[name='name_one_dept_sale']").val(nameOneSaleSum.toFixed(2));
                $("input[name='name_two_dept_sale']").val(nameTwoSaleSum.toFixed(2));
                $("input[name='name_three_dept_sale']").val(nameThreeSaleSum.toFixed(2));
                $("input[name='name_four_dept_sale']").val(nameFourSaleSum.toFixed(2));
                
                // Calculate the total department goal
                var totalDeptGoal = nameOneSaleGoal + nameTwoSaleGoal + nameThreeSaleGoal + nameFourSaleGoal;
                $("input[name='total_dept_goal']").val(totalDeptGoal.toFixed(2));
                // Calculate the total department goal
                var totalDeptSale = nameOneSaleSum + nameTwoSaleSum + nameThreeSaleSum + nameFourSaleSum;
                $("input[name='total_dept_sale']").val(totalDeptSale.toFixed(2));
                
        }


        // Function to update total values for each day
        function updateTotalsForDay(day) {
                var totalGoal = 0;
                var totalSales = 0;
                var totalInv = 0;
                var totalLines = 0;
                var totalLPI = 0;
                var totalDlrInv = 0;

                // Loop through each name and sum up their values for the specified day
                for (var i = 1; i <= 4; i++) {
                var nameIndex = "";
                switch (i) {
                        case 1:
                        nameIndex = "one";
                        break;
                        case 2:
                        nameIndex = "two";
                        break;
                        case 3:
                        nameIndex = "three";
                        break;
                        case 4:
                        nameIndex = "four";
                        break;
                        // Add more cases if needed
                }

                var nameSales = parseFloat($(`[name="mo_name_${nameIndex}_sales_${day}"]`).val()) || 0;
                var nameInv = parseFloat($(`[name="mo_name_${nameIndex}_inv_${day}"]`).val()) || 0;
                var nameLines = parseFloat($(`[name="mo_name_${nameIndex}_lines_${day}"]`).val()) || 0;
                var nameLPI = parseFloat($(`[name="mo_name_${nameIndex}_LPI_${day}"]`).val()) || 0;
                var nameDlrInv = parseFloat($(`[name="mo_name_${nameIndex}_dlr_inv_${day}"]`).val()) || 0;

                totalSales += nameSales;
                totalInv += nameInv;
                totalLines += nameLines;
                totalLPI += nameLPI;
                totalDlrInv += nameDlrInv;
                }


                // Update the total values for the specified day
                $(`[name="mo_total_sales_${day}"]`).val(totalSales.toFixed(2));
                $(`[name="mo_total_inv_${day}"]`).val(totalInv);
                $(`[name="mo_total_lines_${day}"]`).val(totalLines);
                $(`[name="mo_total_LPI_${day}"]`).val(totalLPI.toFixed(2));
                $(`[name="mo_total_dlr_inv_${day}"]`).val(totalDlrInv.toFixed(2));
        }

        // Function to update total values for all days
        function updateTotalsForAllDays(numDays) {
                for (var day = 1; day <= numDays; day++) {
                        updateTotalsForDay(day);
                }
        }

        function calculateDailyRetail(totalDays) {
                // Loop through each day
                for (var day = 1; day <= totalDays; day++) {
                        // Get the mo_total_sales value for the current day
                        var moTotalSales = parseFloat($(`[name="mo_total_sales_${day}"]`).val()) || 0;

                        // Calculate daily_retail value (adjust the calculation as needed)
                        var dailyRetail = moTotalSales; // Adjust the multiplier as per your calculation

                        // Set the calculated value to the daily_retail input field
                        $(`[name="daily_retail_${day}"]`).val(dailyRetail.toFixed(2)); // Adjust toFixed as per your requirement
                }
        }


        function calculateDailyOU1(totalDays) {
                for (var day = 1; day <= totalDays; day++) {
                        var dailyRetail = parseFloat($(`[name="daily_retail_${day}"]`).val()) || 0;
                        var dailySalesGoal = parseFloat($(`[name="daily_sales_goal_${day}"]`).val()) || 0;

                        // Calculate daily_ou1 value
                        var dailyOU1 = dailyRetail - dailySalesGoal;

                        // Set the calculated value to the daily_ou1 input field
                        $(`[name="daily_ou1_${day}"]`).val(dailyOU1.toFixed(2)); // Adjust toFixed as per your requirement
                }
        }

        function calculateDailyValues(totalDays) {
                for (var day = 1; day <= totalDays; day++) {
                        // Get the previous day's daily_current, daily_ly1, and daily_goal values
                        var prevDailyCurrent = day > 1 ? parseFloat($(`[name="daily_current_${day - 1}"]`).val()) || 0 : 0;
                        var prevDailyLy2 = day > 1 ? parseFloat($(`[name="daily_ly2_${day - 1}"]`).val()) || 0 : 0;
                        var prevDailyGoal = day > 1 ? parseFloat($(`[name="daily_goal_${day - 1}"]`).val()) || 0 : 0;

                        // Get the current day's values
                        var dailyRetail = parseFloat($(`[name="daily_retail_${day}"]`).val()) || 0;
                        var dailyLy1 = parseFloat($(`[name="daily_ly1_${day}"]`).val()) || 0;
                        var dailySalesGoal = parseFloat($(`[name="daily_sales_goal_${day}"]`).val()) || 0;

                        // Calculate daily_current, daily_ly2, and daily_goal values
                        var dailyCurrent = prevDailyCurrent + dailyRetail;
                        var dailyLy2 = prevDailyLy2 + dailyLy1;
                        var dailyGoal = prevDailyGoal + dailySalesGoal;

                        // Set the calculated values to the respective input fields
                        $(`[name="daily_current_${day}"]`).val(dailyCurrent.toFixed(2)); // Adjust toFixed as per your requirement
                        $(`[name="daily_ly2_${day}"]`).val(dailyLy2.toFixed(2));
                        $(`[name="daily_goal_${day}"]`).val(dailyGoal.toFixed(2));
                }
        }

        function calculateDailyOu2Values(totalDays) {
                for (var day = 1; day <= totalDays; day++) {
                        // Get the current day's daily_current and daily_goal values
                        var dailyCurrent = parseFloat($(`[name="daily_current_${day}"]`).val()) || 0;
                        var dailyGoal = parseFloat($(`[name="daily_goal_${day}"]`).val()) || 0;

                        // Calculate daily_ou2 value
                        var dailyOu2 = dailyCurrent - dailyGoal;

                        // Set the calculated value to the respective input field
                        $(`[name="daily_ou2_${day}"]`).val(dailyOu2.toFixed(2)); // Adjust toFixed as per your requirement
                }
        }

        function calculateDailySumValues(totalDays) {
                var sumValues = {
                        daily_retail: 0,
                        daily_ly1: 0,
                        daily_cost: 0,
                        daily_margin: 0,
                        daily_sales_goal: 0,
                        daily_ou1: 0
                };

                for (var day = 1; day <= totalDays; day++) {
                        sumValues.daily_retail += parseFloat($(`[name="daily_retail_${day}"]`).val()) || 0;
                        sumValues.daily_ly1 += parseFloat($(`[name="daily_ly1_${day}"]`).val()) || 0;
                        sumValues.daily_cost += parseFloat($(`[name="daily_cost_${day}"]`).val()) || 0;
                        sumValues.daily_margin += parseFloat($(`[name="daily_margin_${day}"]`).val()) || 0;
                        sumValues.daily_sales_goal += parseFloat($(`[name="daily_sales_goal_${day}"]`).val()) || 0;
                        sumValues.daily_ou1 += parseFloat($(`[name="daily_ou1_${day}"]`).val()) || 0;
                }

                // Set sum values in the respective input fields
                $('[name="daily_retail_sum"]').val(sumValues.daily_retail.toFixed(2)); // Adjust toFixed as per your requirement
                $('[name="daily_ly1_sum"]').val(sumValues.daily_ly1.toFixed(2));
                $('[name="daily_cost_sum"]').val(sumValues.daily_cost.toFixed(2));
                $('[name="daily_margin_sum"]').val(sumValues.daily_margin.toFixed(2));
                $('[name="daily_sales_goal_sum"]').val(sumValues.daily_sales_goal.toFixed(2));
                $('[name="daily_ou1_sum"]').val(sumValues.daily_ou1.toFixed(2));
        }



        function calculateDailyTracking(dailyRetailSum) {
                var today = new Date();
                var daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();

                var result = (dailyRetailSum / (today.getDate() - 1) * (daysInMonth - (today.getDate() - 1))) + dailyRetailSum;

                // Set the result in the daily_tracking and daily_actual input fields
                $('[name="daily_tracking"]').val(result.toFixed(2)); // Adjust toFixed as per your requirement
                $('[name="daily_actual"]').val(dailyRetailSum.toFixed(2)); // Adjust toFixed as per your requirement
        }



        function updateDailyValues(dailySalesGoalSum, dailyOu1Sum) {
                // Set the value of daily_sales_goal_sum to daily_on_track
                $('[name="daily_on_track"]').val(dailySalesGoalSum.toFixed(2)); // Adjust toFixed as per your requirement

                // Set the value of daily_ou1_sum to daily_on_above_below
                // var dailyOnAboveBelow = dailyOu1Sum - dailySalesGoalSum;
                $('[name="daily_on_above_below"]').val(dailyOu1Sum.toFixed(2)); // Adjust toFixed as per your requirement
        }
        // Define the function to update additional fields
        function updateAdditionalFields() {
                // Update sales standing values
                $('[name="sales_standing_one_value"]').val($('[name="mo_name_one_sales_sum"]').val());
                $('[name="sales_standing_two_value"]').val($('[name="mo_name_two_sales_sum"]').val());
                $('[name="sales_standing_three_value"]').val($('[name="mo_name_three_sales_sum"]').val());
                $('[name="sales_standing_four_value"]').val($('[name="mo_name_four_sales_sum"]').val());

                // Update dlr per inv values
                $('[name="dlr_per_inv_one_value"]').val($('[name="mo_name_one_dlr_inv_sum"]').val());
                $('[name="dlr_per_inv_two_value"]').val($('[name="mo_name_two_dlr_inv_sum"]').val());
                $('[name="dlr_per_inv_three_value"]').val($('[name="mo_name_three_dlr_inv_sum"]').val());
                $('[name="dlr_per_inv_four_value"]').val($('[name="mo_name_four_dlr_inv_sum"]').val());

                // Update total LPI values
                $('[name="total_LPI_one_value"]').val($('[name="mo_name_one_LPI_sum"]').val());
                $('[name="total_LPI_two_value"]').val($('[name="mo_name_two_LPI_sum"]').val());
                $('[name="total_LPI_three_value"]').val($('[name="mo_name_three_LPI_sum"]').val());
                $('[name="total_LPI_four_value"]').val($('[name="mo_name_four_LPI_sum"]').val());

        }

        // Function to calculate department pace
        function calculateDepartmentPace(inputField, resultField) {
                var inputValue = parseFloat($('[name="' + inputField + '"]').val()) || 0;
                var today = new Date();
                var daysInMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0).getDate();
                var departmentPace = (inputValue / (today.getDate() - 1) * (daysInMonth - (today.getDate() - 1))) + inputValue;
                
                // Update the result field with the calculated value
                $('[name="' + resultField + '"]').val(departmentPace.toFixed(2));
        }

        // Bind the updateGoals function to input events
        $(".form-control").on("input", function () {
                updateTotalsForAllDays(31);
                updateGoals();
                calculateTotal();
                calculateSums(31);
                calculateMOSums(31);
                calculateDailyRetail(31);
                calculateDailyOU1(31);
                calculateDailyValues(31);
                calculateDailyOu2Values(31);
                calculateDailySumValues(31);
                
                // Extract the relevant values from your inputs
                var dailyRetailSum = parseFloat($('[name="daily_retail_sum"]').val()) || 0;
                var dailySalesGoalSum = parseFloat($('[name="daily_sales_goal_sum"]').val()) || 1; // Ensure it's not 0 to avoid division by zero
                var dailyOu1Sum = parseFloat($('[name="daily_ou1_sum"]').val()) || 0;

                // Calculate daily_actual_goal and add % symbol
                var dailyActualGoal = (dailyRetailSum / dailySalesGoalSum) * 100;
                
                // Update the input field with the calculated value and % symbol
                $('[name="daily_actual_goal"]').val(dailyActualGoal.toFixed(2) + '%');
                
                // Call the functions with the required values
                calculateDailyTracking(dailyRetailSum);
                updateDailyValues(dailySalesGoalSum, dailyOu1Sum);
                updateAdditionalFields();

                // Call the function for mo_total_sales_sum
                calculateDepartmentPace("mo_total_sales_sum", "total_dept_pace");

                // Call the function for mo_name_one_sales_sum
                calculateDepartmentPace("mo_name_one_sales_sum", "name_one_dept_pace");

                // Call the function for mo_name_two_sales_sum
                calculateDepartmentPace("mo_name_two_sales_sum", "name_two_dept_pace");

                // Call the function for mo_name_three_sales_sum
                calculateDepartmentPace("mo_name_three_sales_sum", "name_three_dept_pace");

                // Call the function for mo_name_three_four_sum
                calculateDepartmentPace("mo_name_three_four_sum", "name_four_dept_pace");
        });

        // Function to update monthly totals
        function updateMonthlyTotals(day) {
            // Update monthly totals for each name
            $("input[name='mo_total_goal_" + day + "']").val($("input[name='goals_" + day + "']").val());
            $("input[name='daily_sales_goal_" + day + "']").val($("input[name='goals_" + day + "']").val());
            $("input[name='mo_name_one_sales_" + day + "']").val($("input[name='name_one_sales_" + day + "']")
                .val());
            $("input[name='mo_name_one_inv_" + day + "']").val($("input[name='name_one_inv_" + day + "']")
            .val());
            $("input[name='mo_name_one_lines_" + day + "']").val($("input[name='name_one_lines_" + day + "']")
                .val());

            $("input[name='mo_name_two_sales_" + day + "']").val($("input[name='name_two_sales_" + day + "']")
                .val());
            $("input[name='mo_name_two_inv_" + day + "']").val($("input[name='name_two_inv_" + day + "']")
            .val());
            $("input[name='mo_name_two_lines_" + day + "']").val($("input[name='name_two_lines_" + day + "']")
                .val());

            $("input[name='mo_name_three_sales_" + day + "']").val($("input[name='name_three_sales_" + day +
                "']").val());
            $("input[name='mo_name_three_inv_" + day + "']").val($("input[name='name_three_inv_" + day + "']")
                .val());
            $("input[name='mo_name_three_lines_" + day + "']").val($("input[name='name_three_lines_" + day +
                "']").val());

            $("input[name='mo_name_four_sales_" + day + "']").val($("input[name='name_four_sales_" + day + "']")
                .val());
            $("input[name='mo_name_four_inv_" + day + "']").val($("input[name='name_four_inv_" + day + "']")
                .val());
            $("input[name='mo_name_four_lines_" + day + "']").val($("input[name='name_four_lines_" + day + "']")
                .val());
        }

        // Loop through days from 1 to 31
        for (let day = 1; day <= 31; day++) {
            // Bind the updateMonthlyTotals function to input events for each day
            $("input[name='goals_" + day + "'], input[name='name_one_sales_" + day +
                "'], input[name='name_one_inv_" + day + "'], input[name='name_one_lines_" + day +
                "'], input[name='name_two_sales_" + day + "'], input[name='name_two_inv_" + day +
                "'], input[name='name_two_lines_" + day + "'], input[name='name_three_sales_" + day +
                "'], input[name='name_three_inv_" + day + "'], input[name='name_three_lines_" + day +
                "'], input[name='name_four_sales_" + day + "'], input[name='name_four_inv_" + day +
                "'], input[name='name_four_lines_" + day + "']").on("input", function () {
                updateMonthlyTotals(day);
            });
        }

        // Function to update subsequent days based on the selected day
        function updateSubsequentDays(selectedDay) {
            var daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
            var startIndex = daysOfWeek.indexOf(selectedDay);

            // Update days from day_2 to day_31
            for (var day = 2; day <= 31; day++) {
                var nextDayIndex = (startIndex + day - 1) % 7;
                var nextDay = daysOfWeek[nextDayIndex];

                $(`[name="day_${day}"]`).val(nextDay);
            }
        }

        // Bind the updateSubsequentDays function to the change event of day_1
        $('[name="day_1"]').on("change", function () {
            var selectedDay = $(this).val();
            updateSubsequentDays(selectedDay);
        });

        // Initial update when the page loads
        updateSubsequentDays($('[name="day_1"]').val());
    });

</script>

@endsection
