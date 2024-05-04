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
                                                name="amount_two"  value="{{$dailyUpdateData->amount_two}}">
                                        </div>
                                        </div>
                                        <div class="form-group mb-3">
                                        <div class="input-group">
                                                <input type="text" class="form-control name_three" name="name_three"
                                                value="{{$dailyUpdateData->name_three}}">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control amount_three"
                                                name="amount_three"  value="{{$dailyUpdateData->amount_three}}">
                                        </div>
                                        </div>
                                        <div class="form-group mb-3">
                                        <div class="input-group">
                                                <input type="text" class="form-control name_four" name="name_four"
                                                value="{{$dailyUpdateData->name_four}}">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control amount_four"
                                                name="amount_four"  value="{{$dailyUpdateData->amount_four}}">
                                        </div>
                                        </div>
                                        <div class="form-group mb-3">
                                        <div class="input-group">
                                                <span class="input-group-text">Total</span>
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control total_amount"
                                                name="total_amount" value="{{$dailyUpdateData->total_amount}}" readonly>
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
                                                    class="form-control" value="{{$dailyUpdateData->name_one}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_two_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_two}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_three_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_three}}" readonly></th>
                                            <th colspan="3"><input type="text" name="name_four_output" id=""
                                                    class="form-control" value="{{$dailyUpdateData->name_four}}" readonly></th>
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
                                                    value="{{$dailyUpdateData->goals_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="day_sum" value="{{$dailyUpdateData->day_sum}}" readonly>
                                            </td>
                                            <td><input type="number" class="form-control" name="date_sum" value="{{$dailyUpdateData->date_sum}}"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_sum"
                                                    value="{{$dailyUpdateData->name_one_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_sum"
                                                    value="{{$dailyUpdateData->name_one_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_sum"
                                                    value="{{$dailyUpdateData->name_one_lines_sum}}" readonly></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_sum"
                                                    value="{{$dailyUpdateData->name_two_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_sum"
                                                    value="{{$dailyUpdateData->name_two_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_sum"
                                                    value="{{$dailyUpdateData->name_two_lines_sum}}" readonly></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_sum"
                                                    value="{{$dailyUpdateData->name_three_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_sum"
                                                    value="{{$dailyUpdateData->name_three_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_sum"
                                                    value="{{$dailyUpdateData->name_three_lines_sum}}" readonly></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_sum"
                                                    value="{{$dailyUpdateData->name_four_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_sum"
                                                    value="{{$dailyUpdateData->name_four_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_sum"
                                                    value="{{$dailyUpdateData->name_four_lines_sum}}" readonly></td>
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
                                                                value="{{ $mo_total_goal[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_total_sales_{{$day}}"
                                                                value="{{ $mo_total_sales[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_total_inv_{{$day}}"
                                                                value="{{ $mo_total_inv[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_total_lines_{{$day}}"
                                                                value="{{ $mo_total_lines[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_total_LPI_{{$day}}"
                                                                value="{{ $mo_total_LPI[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_total_dlr_inv_{{$day}}"
                                                                value="{{ $mo_total_dlr_inv[$day] ?? '' }}" readonly></td>
                                                
                                                
                                                        
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_sales_{{$day}}"
                                                                value="{{ $mo_name_one_sales[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_inv_{{$day}}"
                                                                value="{{ $mo_name_one_inv[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_lines_{{$day}}"
                                                                value="{{ $mo_name_one_lines[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_LPI_{{$day}}"
                                                                value="{{ $mo_name_one_LPI[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_one_dlr_inv[$day] ?? '' }}" readonly></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_sales_{{$day}}"
                                                                value="{{ $mo_name_two_sales[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_inv_{{$day}}"
                                                                value="{{ $mo_name_two_inv[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_lines_{{$day}}"
                                                                value="{{ $mo_name_two_lines[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_LPI_{{$day}}"
                                                                value="{{ $mo_name_two_LPI[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_two_dlr_inv[$day] ?? '' }}" readonly></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_sales_{{$day}}"
                                                                value="{{ $mo_name_three_sales[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_inv_{{$day}}"
                                                                value="{{ $mo_name_three_inv[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_lines_{{$day}}"
                                                                value="{{ $mo_name_three_lines[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_LPI_{{$day}}"
                                                                value="{{ $mo_name_three_LPI[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_three_dlr_inv[$day] ?? '' }}" readonly></td>
                                                
                                                        <td>{{$day}}</td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_sales_{{$day}}"
                                                                value="{{ $mo_name_four_sales[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_inv_{{$day}}"
                                                                value="{{ $mo_name_four_inv[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_lines_{{$day}}"
                                                                value="{{ $mo_name_four_lines[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_LPI_{{$day}}"
                                                                value="{{ $mo_name_four_LPI[$day] ?? '' }}" readonly></td>
                                                        <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_{{$day}}"
                                                                value="{{ $mo_name_four_dlr_inv[$day] ?? '' }}" readonly></td>
                                                </tr>

                                        @endfor

                                        
                                        {{-- Day sum  --}}
                                        <tr>
                                            <td>Sum</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_sum"
                                                    value="{{$dailyUpdateData->mo_total_goal_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_sum"
                                                    value="{{$dailyUpdateData->mo_total_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_sum"
                                                    value="{{$dailyUpdateData->mo_total_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_sum"
                                                    value="{{$dailyUpdateData->mo_total_lines_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_total_LPI_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_total_dlr_inv_sum}}" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_lines_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_LPI_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_one_dlr_inv_sum}}" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_lines_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_LPI_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_two_dlr_inv_sum}}" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_lines_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_LPI_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_three_dlr_inv_sum}}" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_sales_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_inv_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_lines_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_LPI_sum}}" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_sum"
                                                    value="{{$dailyUpdateData->mo_name_four_dlr_inv_sum}}" readonly></td>
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
                                                        value="{{ $daily_retail[$day] ?? '' }}" readonly></td>
                                                <td><input type="text" class="form-control" name="daily_ly1_{{$day}}" value="{{ $daily_ly1[$day] ?? '' }}"></td>
                                                <td><input type="text" class="form-control" name="daily_cost_{{$day}}" value="{{ $daily_cost[$day] ?? '' }}">
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_margin_{{$day}}"
                                                        value="{{ $daily_margin[$day] ?? '' }}" readonly></td>

                                                <td><input type="text" class="form-control" name="daily_sales_goal_{{$day}}"
                                                        value="{{ $daily_sales_goal[$day] ?? '' }}" readonly></td>

                                                <td><input type="text" class="form-control" name="daily_ou1_{{$day}}" value="{{ $daily_ou1[$day] ?? '' }}" readonly>
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_current_{{$day}}"
                                                        value="{{ $daily_current[$day] ?? '' }}" readonly></td>
                                                <td><input type="text" class="form-control" name="daily_ly2_{{$day}}" value="{{ $daily_ly2[$day] ?? '' }}" readonly>
                                                </td>

                                                <td><input type="text" class="form-control" name="daily_goal_{{$day}}" value="{{ $daily_goal[$day] ?? '' }}" readonly>
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_ou2_{{$day}}" value="{{ $daily_ou2[$day] ?? '' }}" readonly>
                                                </td>
                                        </tr>
                                        @endfor
                                    
                                        {{-- Day sum  --}}
                                        <tr>
                                                <td><input type="number" class="form-control" name="daily_date_sum" value="{{$dailyUpdateData->daily_date_sum}}"
                                                        readonly></td>
                                                <td><input type="text" class="form-control" name="daily_retail_sum"
                                                        value="{{$dailyUpdateData->daily_retail_sum}}" readonly></td>
                                                <td><input type="text" class="form-control" name="daily_ly1_sum" value="{{$dailyUpdateData->daily_ly1_sum}}" readonly></td>
                                                <td><input type="text" class="form-control" name="daily_cost_sum"
                                                        value="{{$dailyUpdateData->daily_cost_sum}}" readonly>
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_margin_sum"
                                                        value="{{$dailyUpdateData->daily_margin_sum}}" readonly></td>

                                                <td><input type="text" class="form-control" name="daily_sales_goal_sum"
                                                        value="{{$dailyUpdateData->daily_sales_goal_sum}}" readonly></td>

                                                <td><input type="text" class="form-control" name="daily_ou1_sum" value="{{$dailyUpdateData->daily_ou1_sum}}" readonly>
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_current_sum"
                                                        value="{{$dailyUpdateData->daily_current_sum}}" readonly></td>
                                                <td><input type="text" class="form-control" name="daily_ly2_sum" value="{{$dailyUpdateData->daily_ly2_sum}}" readonly>
                                                </td>

                                                <td><input type="text" class="form-control" name="daily_goal_sum"
                                                        value="{{$dailyUpdateData->daily_goal_sum}}" readonly>
                                                </td>
                                                <td><input type="text" class="form-control" name="daily_ou2_sum" value="{{$dailyUpdateData->daily_ou2_sum}}" readonly>
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
                                            value="{{$dailyUpdateData->daily_tracking}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual</span>
                                            <input type="text" name="daily_actual" class="form-control"
                                            value="{{$dailyUpdateData->daily_actual}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual % Of Goal</span>
                                            <input type="text" name="daily_actual_goal" class="form-control"
                                            value="{{$dailyUpdateData->daily_actual_goal}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">On Track</span>
                                            <input type="text" name="daily_on_track" class="form-control"
                                                 value="{{$dailyUpdateData->daily_on_track}}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">No. of Business Days</span>
                                            <input type="text" name="daily_no_business_days" class="form-control"
                                            value="{{$dailyUpdateData->daily_no_business_days}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Above/Below On Track</span>
                                            <input type="text" name="daily_on_above_below" class="form-control"
                                                 value="{{$dailyUpdateData->daily_on_above_below}}" readonly>
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

<script src="{{ asset('frontend/js/jquery.min.js')}}"></script>
<script>
        // Get all input elements
        const inputs = document.querySelectorAll('input');
        // Add event listener to each input
        inputs.forEach((input, index) => {
            // Add event listener for key press
            input.addEventListener('keypress', function(event) {
                // Check if Enter key is pressed
                if (event.key === 'Enter') {
                    // Prevent default form submission behavior
                    event.preventDefault();
    
                    // Get the index of the current input
                    const currentIndex = Array.from(inputs).indexOf(input);
                    
                    // Get the total number of inputs in the current row
                    const currentRow = this.closest('tr');
                    const inputsInCurrentRow = currentRow.querySelectorAll('input').length;
    
                    // Calculate the index of the next input in the next row
                    const nextIndex = currentIndex + inputsInCurrentRow;
    
                    // Check if the next input index is within the range of existing inputs
                    if (nextIndex < inputs.length) {
                        // Move focus to the next input in the next row
                        inputs[nextIndex].focus();
                    } else {
                        // If no input below, move to the next column
                        const currentColumnIndex = Array.from(currentRow.children).indexOf(this.parentElement);
                        const nextColumnIndex = currentColumnIndex + 1;
                        const nextColumn = currentRow.parentElement.querySelectorAll('tr td')[nextColumnIndex];
                        if (nextColumn) {
                            const nextColumnInputs = nextColumn.querySelectorAll('input');
                            if (nextColumnInputs.length > 0) {
                                nextColumnInputs[0].focus(); // Focus on the first input in the next column
                            }
                        }
                    }
                }
            });
        });
</script>

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
            $("input[name='total_dept_goal']").val(totalAmount.toFixed(2));

            // Update the output fields with the corresponding names
            $("input[name='name_one_dept_goal']").val(amountOne.toFixed(2));
            $("input[name='name_two_dept_goal']").val(amountTwo.toFixed(2));
            $("input[name='name_three_dept_goal']").val(amountThree.toFixed(2));
            $("input[name='name_four_dept_goal']").val(amountFour.toFixed(2));

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
            $(".name_one_input_group").val($(".name_one").val());
            $(".name_two_input_group").val($(".name_two").val());
            $(".name_three_input_group").val($(".name_three").val());
            $(".name_four_input_group").val($(".name_four").val());
            
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

        function calculateSums() {
                var goalsSum = 0;
                var nameOneSalesSum = 0;
                var nameOneInvSum = 0;
                var nameOneLinesSum = 0;

                var nameTwoSalesSum = 0;
                var nameTwoInvSum = 0;
                var nameTwoLinesSum = 0;

                var nameThreeSalesSum = 0;
                var nameThreeInvSum = 0;
                var nameThreeLinesSum = 0;

                var nameFourSalesSum = 0;
                var nameFourInvSum = 0;
                var nameFourLinesSum = 0;

                // Loop through days from 1 to 31
                for (var day = 1; day <= 31; day++) {
                        goalsSum += parseFloat($("input[name='goals_" + day + "']").val()) || 0;
                        nameOneSalesSum += parseFloat($("input[name='name_one_sales_" + day + "']").val()) || 0;
                        nameOneInvSum += parseFloat($("input[name='name_one_inv_" + day + "']").val()) || 0;
                        nameOneLinesSum += parseFloat($("input[name='name_one_lines_" + day + "']").val()) || 0;

                        nameTwoSalesSum += parseFloat($("input[name='name_two_sales_" + day + "']").val()) || 0;
                        nameTwoInvSum += parseFloat($("input[name='name_two_inv_" + day + "']").val()) || 0;
                        nameTwoLinesSum += parseFloat($("input[name='name_two_lines_" + day + "']").val()) || 0;

                        nameThreeSalesSum += parseFloat($("input[name='name_three_sales_" + day + "']").val()) || 0;
                        nameThreeInvSum += parseFloat($("input[name='name_three_inv_" + day + "']").val()) || 0;
                        nameThreeLinesSum += parseFloat($("input[name='name_three_lines_" + day + "']").val()) || 0;

                        nameFourSalesSum += parseFloat($("input[name='name_four_sales_" + day + "']").val()) || 0;
                        nameFourInvSum += parseFloat($("input[name='name_four_inv_" + day + "']").val()) || 0;
                        nameFourLinesSum += parseFloat($("input[name='name_four_lines_" + day + "']").val()) || 0;
                }

                // Update the sum fields
                $("input[name='goals_sum']").val(goalsSum.toFixed(2));
                $("input[name='name_one_sales_sum']").val(nameOneSalesSum.toFixed(2));
                $("input[name='name_one_inv_sum']").val(nameOneInvSum);
                $("input[name='name_one_lines_sum']").val(nameOneLinesSum);

                $("input[name='name_two_sales_sum']").val(nameTwoSalesSum.toFixed(2));
                $("input[name='name_two_inv_sum']").val(nameTwoInvSum);
                $("input[name='name_two_lines_sum']").val(nameTwoLinesSum);

                $("input[name='name_three_sales_sum']").val(nameThreeSalesSum.toFixed(2));
                $("input[name='name_three_inv_sum']").val(nameThreeInvSum);
                $("input[name='name_three_lines_sum']").val(nameThreeLinesSum);

                $("input[name='name_four_sales_sum']").val(nameFourSalesSum.toFixed(2));
                $("input[name='name_four_inv_sum']").val(nameFourInvSum);
                $("input[name='name_four_lines_sum']").val(nameFourLinesSum);
        }


        function copyToMonthly() {
                for (var day = 1; day <= 31; day++) {
                        var goals = parseFloat($("input[name='goals_" + day + "']").val()) || 0;
                        $("input[name='mo_total_goal_" + day + "']").val(goals.toFixed(2));
                        
                        var nameOneSales = parseFloat($("input[name='name_one_sales_" + day + "']").val()) || 0;
                        $("input[name='mo_name_one_sales_" + day + "']").val(nameOneSales.toFixed(2));
                        $("input[name='mo_name_one_inv_" + day + "']").val($("input[name='name_one_inv_" + day + "']").val());
                        $("input[name='mo_name_one_lines_" + day + "']").val($("input[name='name_one_lines_" + day + "']").val());
                        
                        var nameTwoSales = parseFloat($("input[name='name_two_sales_" + day + "']").val()) || 0;
                        $("input[name='mo_name_two_sales_" + day + "']").val(nameTwoSales.toFixed(2));
                        $("input[name='mo_name_two_inv_" + day + "']").val($("input[name='name_two_inv_" + day + "']").val());
                        $("input[name='mo_name_two_lines_" + day + "']").val($("input[name='name_two_lines_" + day + "']").val());
                        
                        var nameThreeSales = parseFloat($("input[name='name_three_sales_" + day + "']").val()) || 0;
                        $("input[name='mo_name_three_sales_" + day + "']").val(nameThreeSales.toFixed(2));
                        $("input[name='mo_name_three_inv_" + day + "']").val($("input[name='name_three_inv_" + day + "']").val());
                        $("input[name='mo_name_three_lines_" + day + "']").val($("input[name='name_three_lines_" + day + "']").val());
                        
                        var nameFourSales = parseFloat($("input[name='name_four_sales_" + day + "']").val()) || 0;
                        $("input[name='mo_name_four_sales_" + day + "']").val(nameFourSales.toFixed(2));
                        $("input[name='mo_name_four_inv_" + day + "']").val($("input[name='name_four_inv_" + day + "']").val());
                        $("input[name='mo_name_four_lines_" + day + "']").val($("input[name='name_four_lines_" + day + "']").val());
                        
                        // Calculate mo_total_sales, mo_total_inv, and mo_total_lines
                        var moTotalSales = nameOneSales + nameTwoSales + nameThreeSales + nameFourSales;
                        $("input[name='mo_total_sales_" + day + "']").val(moTotalSales.toFixed(2));
                        
                        var moTotalInv = parseFloat($("input[name='mo_name_one_inv_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_two_inv_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_three_inv_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_four_inv_" + day + "']").val() || 0);
                        $("input[name='mo_total_inv_" + day + "']").val(moTotalInv);
                        
                        var moTotalLines = parseFloat($("input[name='mo_name_one_lines_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_two_lines_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_three_lines_" + day + "']").val() || 0) +
                        parseFloat($("input[name='mo_name_four_lines_" + day + "']").val() || 0);
                        $("input[name='mo_total_lines_" + day + "']").val(moTotalLines);
                        
                        // Calculate mo_total_LPI and mo_total_dlr_inv
                        var moTotalLPI = moTotalInv !== 0 ? moTotalLines / moTotalInv : 0;
                        $("input[name='mo_total_LPI_" + day + "']").val(moTotalLPI.toFixed(2));
                        
                        var moTotalDlrInv = moTotalInv !== 0 ? moTotalSales / moTotalInv : 0;
                        $("input[name='mo_total_dlr_inv_" + day + "']").val(moTotalDlrInv.toFixed(2));
                        
                        // Calculate mo_name_one_LPI and mo_name_one_dlr_inv
                        var moNameOneLPI = $("input[name='name_one_inv_" + day + "']").val() && $("input[name='name_one_inv_" + day + "']").val() !== '0' ? $("input[name='name_one_lines_" + day + "']").val() / $("input[name='name_one_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_one_LPI_" + day + "']").val(moNameOneLPI.toFixed(2));

                        var moNameOneDlrInv = $("input[name='name_one_inv_" + day + "']").val() && $("input[name='name_one_inv_" + day + "']").val() !== '0' ? $("input[name='name_one_sales_" + day + "']").val() / $("input[name='name_one_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_one_dlr_inv_" + day + "']").val(moNameOneDlrInv.toFixed(2));

                        // Calculate mo_name_two_LPI and mo_name_two_dlr_inv
                        var moNameTwoLPI = $("input[name='name_two_inv_" + day + "']").val() && $("input[name='name_two_inv_" + day + "']").val() !== '0' ? $("input[name='name_two_lines_" + day + "']").val() / $("input[name='name_two_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_two_LPI_" + day + "']").val(moNameTwoLPI.toFixed(2));

                        var moNameTwoDlrInv = $("input[name='name_two_inv_" + day + "']").val() && $("input[name='name_two_inv_" + day + "']").val() !== '0' ? $("input[name='name_two_sales_" + day + "']").val() / $("input[name='name_two_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_two_dlr_inv_" + day + "']").val(moNameTwoDlrInv.toFixed(2));

                        // Calculate mo_name_three_LPI and mo_name_three_dlr_inv
                        var moNameThreeLPI = $("input[name='name_three_inv_" + day + "']").val() && $("input[name='name_three_inv_" + day + "']").val() !== '0' ? $("input[name='name_three_lines_" + day + "']").val() / $("input[name='name_three_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_three_LPI_" + day + "']").val(moNameThreeLPI.toFixed(2));

                        var moNameThreeDlrInv = $("input[name='name_three_inv_" + day + "']").val() && $("input[name='name_three_inv_" + day + "']").val() !== '0' ? $("input[name='name_three_sales_" + day + "']").val() / $("input[name='name_three_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_three_dlr_inv_" + day + "']").val(moNameThreeDlrInv.toFixed(2));

                        // Calculate mo_name_four_LPI and mo_name_four_dlr_inv
                        var moNameFourLPI = $("input[name='name_four_inv_" + day + "']").val() && $("input[name='name_four_inv_" + day + "']").val() !== '0' ? $("input[name='name_four_lines_" + day + "']").val() / $("input[name='name_four_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_four_LPI_" + day + "']").val(moNameFourLPI.toFixed(2));

                        var moNameFourDlrInv = $("input[name='name_four_inv_" + day + "']").val() && $("input[name='name_four_inv_" + day + "']").val() !== '0' ? $("input[name='name_four_sales_" + day + "']").val() / $("input[name='name_four_inv_" + day + "']").val() : 0;
                        $("input[name='mo_name_four_dlr_inv_" + day + "']").val(moNameFourDlrInv.toFixed(2));

                }
        }

        function calculateMOSums() {
                var goalsSum = 0;
                var nameOneSalesSum = 0;
                var nameOneInvSum = 0;
                var nameOneLinesSum = 0;

                var nameTwoSalesSum = 0;
                var nameTwoInvSum = 0;
                var nameTwoLinesSum = 0;

                var nameThreeSalesSum = 0;
                var nameThreeInvSum = 0;
                var nameThreeLinesSum = 0;

                var nameFourSalesSum = 0;
                var nameFourInvSum = 0;
                var nameFourLinesSum = 0;

                // Loop through days from 1 to 31
                for (var day = 1; day <= 31; day++) {
                        goalsSum += parseFloat($("input[name='mo_total_goal_" + day + "']").val()) || 0;
                        nameOneSalesSum += parseFloat($("input[name='mo_name_one_sales_" + day + "']").val()) || 0;
                        nameOneInvSum += parseFloat($("input[name='mo_name_one_inv_" + day + "']").val()) || 0;
                        nameOneLinesSum += parseFloat($("input[name='mo_name_one_lines_" + day + "']").val()) || 0;

                        nameTwoSalesSum += parseFloat($("input[name='mo_name_two_sales_" + day + "']").val()) || 0;
                        nameTwoInvSum += parseFloat($("input[name='mo_name_two_inv_" + day + "']").val()) || 0;
                        nameTwoLinesSum += parseFloat($("input[name='mo_name_two_lines_" + day + "']").val()) || 0;

                        nameThreeSalesSum += parseFloat($("input[name='mo_name_three_sales_" + day + "']").val()) || 0;
                        nameThreeInvSum += parseFloat($("input[name='mo_name_three_inv_" + day + "']").val()) || 0;
                        nameThreeLinesSum += parseFloat($("input[name='mo_name_three_lines_" + day + "']").val()) || 0;

                        nameFourSalesSum += parseFloat($("input[name='mo_name_four_sales_" + day + "']").val()) || 0;
                        nameFourInvSum += parseFloat($("input[name='mo_name_four_inv_" + day + "']").val()) || 0;
                        nameFourLinesSum += parseFloat($("input[name='mo_name_four_lines_" + day + "']").val()) || 0;
                }

                // Calculate totals
                var mo_total_sales_sum = nameOneSalesSum + nameTwoSalesSum + nameThreeSalesSum + nameFourSalesSum;
                var mo_total_inv_sum = nameOneInvSum + nameTwoInvSum + nameThreeInvSum + nameFourInvSum;
                var mo_total_lines_sum = nameOneLinesSum + nameTwoLinesSum + nameThreeLinesSum + nameFourLinesSum;
                var mo_total_LPI_sum = mo_total_inv_sum !== 0 ? mo_total_lines_sum / mo_total_inv_sum : 0;
                var mo_total_dlr_inv_sum = mo_total_inv_sum !== 0 ? mo_total_sales_sum / mo_total_inv_sum : 0;

                var mo_name_one_LPI_sum = nameOneInvSum !== 0 ? nameOneLinesSum / nameOneInvSum : 0;
                var mo_name_one_dlr_inv_sum = nameOneInvSum !== 0 ? nameOneSalesSum / nameOneInvSum : 0;

                var mo_name_two_LPI_sum = nameTwoInvSum !== 0 ? nameTwoLinesSum / nameTwoInvSum : 0;
                var mo_name_two_dlr_inv_sum = nameTwoInvSum !== 0 ? nameTwoSalesSum / nameTwoInvSum : 0;

                var mo_name_three_LPI_sum = nameThreeInvSum !== 0 ? nameThreeLinesSum / nameThreeInvSum : 0;
                var mo_name_three_dlr_inv_sum = nameThreeInvSum !== 0 ? nameThreeSalesSum / nameThreeInvSum : 0;

                var mo_name_four_LPI_sum = nameFourInvSum !== 0 ? nameFourLinesSum / nameFourInvSum : 0;
                var mo_name_four_dlr_inv_sum = nameFourInvSum !== 0 ? nameFourSalesSum / nameFourInvSum : 0;


                // Get today's date
                var todayMO = new Date();
                // Get the last day of the current month
                var lastDayOfMonthMO = new Date(todayMO.getFullYear(), todayMO.getMonth() + 1, 0);
                // Calculate the number of days elapsed in the current month
                var daysElapsedMO = todayMO.getDate() - 1;
                // Calculate the number of days remaining in the current month
                var daysRemainingMO = lastDayOfMonthMO.getDate() - daysElapsedMO;
                // Calculate the sum using the provided formula
                var total_dept_pace = mo_total_sales_sum * (lastDayOfMonthMO.getDate() / (daysElapsedMO - 1));
                // Calculate name_dept_pace for each name
                var name_one_dept_pace = nameOneSalesSum * (lastDayOfMonthMO.getDate() / (daysElapsedMO - 1));
                var name_two_dept_pace = nameTwoSalesSum * (lastDayOfMonthMO.getDate() / (daysElapsedMO - 1));
                var name_three_dept_pace = nameThreeSalesSum * (lastDayOfMonthMO.getDate() / (daysElapsedMO - 1));
                var name_four_dept_pace = nameFourSalesSum * (lastDayOfMonthMO.getDate() / (daysElapsedMO - 1));


                // Update the sum fields
                $("input[name='mo_total_goal_sum']").val(goalsSum.toFixed(2));
                $("input[name='mo_total_sales_sum']").val(mo_total_sales_sum.toFixed(2));
                $("input[name='mo_total_inv_sum']").val(mo_total_inv_sum);
                $("input[name='mo_total_lines_sum']").val(mo_total_lines_sum);
                $("input[name='mo_total_LPI_sum']").val(mo_total_LPI_sum.toFixed(2));
                $("input[name='mo_total_dlr_inv_sum']").val(mo_total_dlr_inv_sum.toFixed(2));

                $("input[name='mo_name_one_sales_sum']").val(nameOneSalesSum.toFixed(2));
                $("input[name='mo_name_one_inv_sum']").val(nameOneInvSum);
                $("input[name='mo_name_one_lines_sum']").val(nameOneLinesSum);
                $("input[name='mo_name_one_LPI_sum']").val(mo_name_one_LPI_sum.toFixed(2));
                $("input[name='mo_name_one_dlr_inv_sum']").val(mo_name_one_dlr_inv_sum.toFixed(2));

                $("input[name='mo_name_two_sales_sum']").val(nameTwoSalesSum.toFixed(2));
                $("input[name='mo_name_two_inv_sum']").val(nameTwoInvSum);
                $("input[name='mo_name_two_lines_sum']").val(nameTwoLinesSum);
                $("input[name='mo_name_two_LPI_sum']").val(mo_name_two_LPI_sum.toFixed(2));
                $("input[name='mo_name_two_dlr_inv_sum']").val(mo_name_two_dlr_inv_sum.toFixed(2));

                $("input[name='mo_name_three_sales_sum']").val(nameThreeSalesSum.toFixed(2));
                $("input[name='mo_name_three_inv_sum']").val(nameThreeInvSum);
                $("input[name='mo_name_three_lines_sum']").val(nameThreeLinesSum);
                $("input[name='mo_name_three_LPI_sum']").val(mo_name_three_LPI_sum.toFixed(2));
                $("input[name='mo_name_three_dlr_inv_sum']").val(mo_name_three_dlr_inv_sum.toFixed(2));

                $("input[name='mo_name_four_sales_sum']").val(nameFourSalesSum.toFixed(2));
                $("input[name='mo_name_four_inv_sum']").val(nameFourInvSum);
                $("input[name='mo_name_four_lines_sum']").val(nameFourLinesSum);
                $("input[name='mo_name_four_LPI_sum']").val(mo_name_four_LPI_sum.toFixed(2));
                $("input[name='mo_name_four_dlr_inv_sum']").val(mo_name_four_dlr_inv_sum.toFixed(2));

                // Update the sum fields
                $("input[name='total_dept_sale']").val(mo_total_sales_sum.toFixed(2));
                $("input[name='name_one_dept_sale']").val(nameOneSalesSum.toFixed(2));
                $("input[name='name_two_dept_sale']").val(nameTwoSalesSum.toFixed(2));
                $("input[name='name_three_dept_sale']").val(nameThreeSalesSum.toFixed(2));
                $("input[name='name_four_dept_sale']").val(nameFourSalesSum.toFixed(2));


                $("input[name='sales_standing_one_value']").val(nameOneSalesSum.toFixed(2));
                $("input[name='sales_standing_two_value']").val(nameTwoSalesSum.toFixed(2));
                $("input[name='sales_standing_three_value']").val(nameThreeSalesSum.toFixed(2));
                $("input[name='sales_standing_four_value']").val(nameFourSalesSum.toFixed(2));

                $("input[name='dlr_per_inv_one_value']").val(mo_name_one_dlr_inv_sum.toFixed(2));
                $("input[name='dlr_per_inv_two_value']").val(mo_name_two_dlr_inv_sum.toFixed(2));
                $("input[name='dlr_per_inv_three_value']").val(mo_name_three_dlr_inv_sum.toFixed(2));
                $("input[name='dlr_per_inv_four_value']").val(mo_name_four_dlr_inv_sum.toFixed(2));

                $("input[name='total_LPI_one_value']").val(mo_name_one_LPI_sum.toFixed(2));
                $("input[name='total_LPI_two_value']").val(mo_name_two_LPI_sum.toFixed(2));
                $("input[name='total_LPI_three_value']").val(mo_name_three_LPI_sum.toFixed(2));
                $("input[name='total_LPI_four_value']").val(mo_name_four_LPI_sum.toFixed(2));

                // Update the sum fields
                $("input[name='total_dept_pace']").val(total_dept_pace.toFixed(2));
                $("input[name='name_one_dept_pace']").val(name_one_dept_pace.toFixed(2));
                $("input[name='name_two_dept_pace']").val(name_two_dept_pace.toFixed(2));
                $("input[name='name_three_dept_pace']").val(name_three_dept_pace.toFixed(2));
                $("input[name='name_four_dept_pace']").val(name_four_dept_pace.toFixed(2));
        }


        function calculateDailyValues() {
                var daily_current_total = 0;
                var daily_goal_total = 0;
                var daily_ly2_total = 0;

                // Loop through days from 1 to 31
                for (var day = 1; day <= 31; day++) {
                        var daily_retail = parseFloat($("input[name='mo_total_sales_" + day + "']").val()) || 0;
                        var daily_sales_goal = parseFloat($("input[name='goals_" + day + "']").val()) || 0;
                        var daily_ly1 = parseFloat($("input[name='daily_ly1_" + day + "']").val()) || 0;
                        var daily_cost = parseFloat($("input[name='daily_cost_" + day + "']").val()) || 0;

                        var daily_margin = ((daily_retail - daily_cost) / daily_retail) * 100;

                        // Calculate daily_ou1
                        var daily_ou1 = daily_retail - daily_sales_goal;

                        // Update the corresponding fields
                        $("input[name='daily_retail_" + day + "']").val(daily_retail.toFixed(2));
                        $("input[name='daily_sales_goal_" + day + "']").val(daily_sales_goal.toFixed(2));
                        // Check if daily_margin is NaN and set it to 0 in that case
                        if (isNaN(daily_margin)) {
                        daily_margin = 0;
                        }

                        // Set the value in the input field based on the condition
                        $("input[name='daily_margin_" + day + "']").val(daily_margin.toFixed(2));
                        $("input[name='daily_ou1_" + day + "']").val(daily_ou1.toFixed(2));

                        // Calculate daily_current
                        daily_current_total += daily_retail;
                        $("input[name='daily_current_" + day + "']").val(daily_current_total.toFixed(2));

                        // Calculate daily_goal
                        daily_goal_total += daily_sales_goal;
                        $("input[name='daily_goal_" + day + "']").val(daily_goal_total.toFixed(2));

                        var daily_ou2 = $("input[name='daily_current_" + day + "']").val() - $("input[name='daily_goal_" + day + "']").val();
                        $("input[name='daily_ou2_" + day + "']").val(daily_ou2.toFixed(2));

                        // Calculate daily_ly2
                        daily_ly2_total += daily_ly1;
                        $("input[name='daily_ly2_" + day + "']").val(daily_ly2_total.toFixed(2));
                }
        }


        function calculateDailySums() {
                var daily_retail_sum = 0;
                var daily_ly1_sum = 0;
                var daily_cost_sum = 0;
                var daily_margin_sum = 0;
                var daily_ou1_sum = 0;
                var daily_sales_goal_sum = 0;

                // Loop through days from 1 to 31
                for (var day = 1; day <= 31; day++) {
                        daily_retail_sum += parseFloat($("input[name='daily_retail_" + day + "']").val()) || 0;
                        daily_ly1_sum += parseFloat($("input[name='daily_ly1_" + day + "']").val()) || 0;
                        daily_cost_sum += parseFloat($("input[name='daily_cost_" + day + "']").val()) || 0;
                        // daily_margin_sum += parseFloat($("input[name='daily_margin_" + day + "']").val()) || 0;
                        daily_ou1_sum += parseFloat($("input[name='daily_ou1_" + day + "']").val()) || 0;
                        daily_sales_goal_sum += parseFloat($("input[name='daily_sales_goal_" + day + "']").val()) || 0;
                }

                var daily_margin_sum = ((daily_retail_sum - daily_cost_sum) / daily_retail_sum) * 100;

                // Set the calculated sums to the corresponding input fields
                $("input[name='daily_retail_sum']").val(daily_retail_sum.toFixed(2));
                $("input[name='daily_ly1_sum']").val(daily_ly1_sum.toFixed(2));
                $("input[name='daily_cost_sum']").val(daily_cost_sum.toFixed(2));
                $("input[name='daily_margin_sum']").val(daily_margin_sum.toFixed(2));
                $("input[name='daily_ou1_sum']").val(daily_ou1_sum.toFixed(2));
                $("input[name='daily_sales_goal_sum']").val(daily_sales_goal_sum.toFixed(2));

                // Calculate additional values
                //var daily_sales_goal_sum = parseFloat($("input[name='daily_sales_goal_sum']").val()) || 0;
                var daysPassed = parseInt($("input[name='daily_no_business_days']").val()) || 0;
                var daily_goal_31 = parseFloat($("input[name='daily_goal_31']").val()) || 0;
                var daily_actual = daily_retail_sum; // Assuming daily_retail_sum is defined
                // Get today's date
                var today = new Date();

                // Get the last day of the current month
                var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

                // Calculate the number of days elapsed in the current month
                var daysElapsed = today.getDate() - 1;

                // Calculate the number of days remaining in the current month
                var daysRemaining = lastDayOfMonth.getDate() - daysElapsed;

                // Calculate the sum using the provided formula
                var daily_tracking = daily_actual * (lastDayOfMonth.getDate() / (daysElapsed - 1));


                var daily_actual_goal = (daily_retail_sum / daily_sales_goal_sum * 100).toFixed(2) + "%"; // Convert to percentage with "%" symbol
                var daily_on_track = daily_goal_31;
                var daily_on_above_below = daily_actual - daily_on_track;

                // Set the calculated additional values to the corresponding input fields
                $("input[name='daily_tracking']").val(daily_tracking.toFixed(2));
                $("input[name='daily_actual']").val(daily_actual.toFixed(2));
                $("input[name='daily_actual_goal']").val(daily_actual_goal); // Add percentage symbol
                $("input[name='daily_on_track']").val(daily_on_track.toFixed(2));
                $("input[name='daily_on_above_below']").val(daily_on_above_below.toFixed(2));
        }

                // Function to get the number of days in the current month
        function daysInMonth() {
                var now = new Date();
                return new Date(now.getFullYear(), now.getMonth() + 1, 0).getDate();
        }

        
        // Bind the updateGoals function to input events
        $(".form-control").on("input", function () {
                calculateTotal();
                calculateSums();
                copyToMonthly();
                calculateMOSums();
                calculateDailyValues();
                calculateDailySums();
        });

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
