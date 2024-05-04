@extends('layouts.avatar')
@section('title')
Daily Sales Update | Know Your Inventory
@endsection
@section('avatar_content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

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
        font-size: 12px !important
    }
    .scroll-container {
    max-height: calc(100vh - 100px); /* Adjust 100px according to your layout */
    overflow-x: auto;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
}

</style>
<div class="row">

    <form action="{{route('save.daily.update')}}" method="POST" id="">
        @csrf
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-3">Daily Sales Update</h1>
            </div>
        </div>
        <div class="col-12 text-center">
            <div class="py-5">
                <label for="title">Month</label>
                <input type="text" class="form-control" name="title" placeholder="Month" required>
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
                                            placeholder="Enter Name">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_one"
                                            name="amount_one" placeholder="$0.00">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_two" name="name_two"
                                            placeholder="Enter Name">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_two"
                                            name="amount_two"  placeholder="$0.00">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_three" name="name_three"
                                            placeholder="Enter Name">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_three"
                                            name="amount_three"  placeholder="$0.00">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control name_four" name="name_four"
                                            placeholder="Enter Name">
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control amount_four"
                                            name="amount_four"  placeholder="$0.00">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Total</span>
                                        <span class="input-group-text">$</span>
                                        <input type="number" step="0.01" class="form-control total_amount"
                                            name="total_amount" placeholder="$0.00" readonly>
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
                    <div id="collapseTwo" class="accordion-collapse collapse overflow-panel" aria-labelledby="headingTwo">
                        <div class="accordion-body wide-load">
                            <div class="table-responsive">
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th rowspan="2">Goals</th>
                                            <th rowspan="2">Day</th>
                                            <th rowspan="2">Date</th>
                                            <th colspan="3"><input type="text" name="name_one_output" id=""
                                                    class="form-control" placeholder="Name" readonly></th>
                                            <th colspan="3"><input type="text" name="name_two_output" id=""
                                                    class="form-control" placeholder="Name" readonly></th>
                                            <th colspan="3"><input type="text" name="name_three_output" id=""
                                                    class="form-control" placeholder="Name" readonly></th>
                                            <th colspan="3"><input type="text" name="name_four_output" id=""
                                                    class="form-control" placeholder="Name" readonly></th>
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
                                        {{-- Day 1  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_1"
                                                    placeholder="$0.00"></td>
                                            <td>
                                                <select name="day_1" class="form-select" id="">
                                                    <option value="Sun">Sun</option>
                                                    <option value="Mon">Mon</option>
                                                    <option value="Tue">Tue</option>
                                                    <option value="Wed">Wed</option>
                                                    <option value="Thu">Thu</option>
                                                    <option value="Fri">Fri</option>
                                                    <option value="Sat">Sat</option>
                                                </select>
                                                {{-- <input type="text" class="form-control" name="day_1" placeholder=""> --}}
                                            </td>
                                            <td><input type="number" class="form-control" name="date_1" value="1"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_1"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_1"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_1"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_1"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_1"
                                                    placeholder=""></td>
                                        </tr>
                                        {{-- Day 2  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_2"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_2" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_2" value="2"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_2"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_2"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_2"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_2"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_2"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 3  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_3"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_3" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_3" value="3"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_3"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_3"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_3"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_3"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_3"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 4  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_4"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_4" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_4" value="4"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_4"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_4"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_4"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_4"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_4"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 5  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_5"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_5" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_5" value="5"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_5"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_5"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_5"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_5"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_5"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 6  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_6"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_6" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_6" value="6"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_6"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_6"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_6"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_6"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_6"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 7  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_7"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_7" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_7" value="7"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_7"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_7"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_7"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_7"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_7"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 8  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_8"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_8" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_8" value="8"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_8"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_8"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_8"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_8"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_8"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 9  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_9"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_9" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_9" value="9"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_9"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_9"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_9"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_9"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_9"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 10  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_10"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_10" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_10" value="10"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_10"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_10"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_10"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_10"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_10"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 11  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_11"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_11" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_11" value="11"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_11"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_11"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_11"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_11"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_11"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 12  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_12"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_12" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_12" value="12"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_12"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_12"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_12"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_12"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_12"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 13  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_13"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_13" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_13" value="13"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_13"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_13"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_13"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_13"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_13"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 14  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_14"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_14" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_14" value="14"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_14"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_14"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_14"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_14"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_14"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 15  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_15"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_15" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_15" value="15"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_15"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_15"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_15"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_15"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_15"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 16  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_16"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_16" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_16" value="16"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_16"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_16"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_16"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_16"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_16"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 17  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_17"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_17" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_17" value="17"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_17"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_17"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_17"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_17"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_17"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 18  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_18"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_18" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_18" value="18"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_18"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_18"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_18"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_18"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_18"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 19  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_19"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_19" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_19" value="19"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_19"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_19"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_19"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_19"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_19"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 20  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_20"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_20" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_20" value="20"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_20"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_20"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_20"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_20"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_20"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 21  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_21"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_21" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_21" value="21"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_21"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_21"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_21"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_21"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_21"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 22  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_22"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_22" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_22" value="22"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_22"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_22"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_22"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_22"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_22"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 23  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_23"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_23" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_23" value="23"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_23"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_23"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_23"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_23"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_23"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 24  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_24"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_24" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_24" value="24"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_24"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_24"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_24"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_24"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_24"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 25  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_25"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_25" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_25" value="25"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_25"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_25"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_25"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_25"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_25"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 26 --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_26"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_26" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_26" value="26"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_26"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_26"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_26"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_26"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_26"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 26 --}}
                                        <tr>
                                                <td><input type="text" class="form-control" name="goals_27"
                                                        placeholder="$0.00"></td>
                                                <td><input type="text" class="form-control" name="day_27" placeholder="">
                                                </td>
                                                <td><input type="number" class="form-control" name="date_27" value="27"
                                                        readonly></td>
    
                                                <td><input type="text" class="form-control" name="name_one_sales_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_one_inv_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_one_lines_27"
                                                        placeholder=""></td>
    
                                                <td><input type="text" class="form-control" name="name_two_sales_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_two_inv_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_two_lines_27"
                                                        placeholder=""></td>
    
                                                <td><input type="text" class="form-control" name="name_three_sales_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_three_inv_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_three_lines_27"
                                                        placeholder=""></td>
    
                                                <td><input type="text" class="form-control" name="name_four_sales_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_four_inv_27"
                                                        placeholder=""></td>
                                                <td><input type="text" class="form-control" name="name_four_lines_27"
                                                        placeholder=""></td>
                                            </tr>

                                        {{-- Day 28  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_28"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_28" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_28" value="28"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_28"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_28"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_28"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_28"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_28"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 29  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_29"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_29" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_29" value="29"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_29"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_29"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_29"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_29"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_29"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 30  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_30"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_30" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_30" value="30"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_30"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_30"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_30"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_30"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_30"
                                                    placeholder=""></td>
                                        </tr>

                                        {{-- Day 31  --}}
                                        <tr>
                                            <td><input type="text" class="form-control" name="goals_31"
                                                    placeholder="$0.00"></td>
                                            <td><input type="text" class="form-control" name="day_31" placeholder="">
                                            </td>
                                            <td><input type="number" class="form-control" name="date_31" value="31"
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_31"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_31"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_31"
                                                    placeholder=""></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_31"
                                                    placeholder=""></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_31"
                                                    placeholder=""></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr style="font-weight: bold">
                                            <td><input type="text" class="form-control" name="goals_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="day_sum" placeholder="" readonly>
                                            </td>
                                            <td><input type="number" class="form-control" name="date_sum" value=""
                                                    readonly></td>

                                            <td><input type="text" class="form-control" name="name_one_sales_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_one_inv_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_one_lines_sum"
                                                    placeholder="" readonly></td>

                                            <td><input type="text" class="form-control" name="name_two_sales_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_two_inv_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_two_lines_sum"
                                                    placeholder="" readonly></td>

                                            <td><input type="text" class="form-control" name="name_three_sales_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_three_inv_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_three_lines_sum"
                                                    placeholder="" readonly></td>

                                            <td><input type="text" class="form-control" name="name_four_sales_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_four_inv_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="name_four_lines_sum"
                                                    placeholder="" readonly></td>
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
                    <div id="collapseThree" class="accordion-collapse collapse foatingScrollbar" aria-labelledby="headingThree">
                        <div class="accordion-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered table-condensed table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>#</th>
                                            <th colspan="7">Total Department</th>
                                            <th colspan="6"><input type="text" name="name_one_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" readonly></th>
                                            <th colspan="6"><input type="text" name="name_two_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" readonly></th>
                                            <th colspan="6"><input type="text" name="name_three_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" readonly></th>
                                            <th colspan="6"><input type="text" name="name_four_mo_output" id=""
                                                    class="form-control" placeholder="Enter Name" readonly></th>
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
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_1"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_1"
                                                    placeholder="" readonly></td>

                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_1"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_1"
                                                    placeholder="" readonly></td>

                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_1"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_1"
                                                    placeholder="" readonly></td>

                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_1"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_1"
                                                    placeholder="" readonly></td>

                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_1"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_1"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_1"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_1"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 2  --}}
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_2"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_2"
                                                    placeholder="" readonly></td>

                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_2"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_2"
                                                    placeholder="" readonly></td>

                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_2"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_2"
                                                    placeholder="" readonly></td>

                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_2"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_2"
                                                    placeholder="" readonly></td>

                                            <td>2</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_2"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_2"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_2"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_2"
                                                    placeholder="" readonly></td>
                                        </tr>

                                        {{-- Day 3  --}}
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_3"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_3"
                                                    placeholder="" readonly></td>

                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_3"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_3"
                                                    placeholder="" readonly></td>

                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_3"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_3"
                                                    placeholder="" readonly></td>

                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_3"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_3"
                                                    placeholder="" readonly></td>

                                            <td>3</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_3"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_3"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_3"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_3"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 4  --}}
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_4"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_4"
                                                    placeholder="" readonly></td>

                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_4"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_4"
                                                    placeholder="" readonly></td>

                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_4"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_4"
                                                    placeholder="" readonly></td>

                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_4"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_4"
                                                    placeholder="" readonly></td>

                                            <td>4</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_4"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_4"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_4"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_4"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 5  --}}
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_5"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_5"
                                                    placeholder="" readonly></td>

                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_5"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_5"
                                                    placeholder="" readonly></td>

                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_5"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_5"
                                                    placeholder="" readonly></td>

                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_5"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_5"
                                                    placeholder="" readonly></td>

                                            <td>5</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_5"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_5"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_5"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_5"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 6  --}}
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_6"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_6"
                                                    placeholder="" readonly></td>

                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_6"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_6"
                                                    placeholder="" readonly></td>

                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_6"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_6"
                                                    placeholder="" readonly></td>

                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_6"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_6"
                                                    placeholder="" readonly></td>

                                            <td>6</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_6"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_6"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_6"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_6"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 7  --}}
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_7"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 7  --}}
                                        {{-- <tr>
                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_7"
                                                    placeholder="" readonly></td>

                                            <td>7</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_7"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_7"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_7"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_7"
                                                    placeholder="" readonly></td>
                                        </tr> --}}
                                        {{-- Day 8  --}}
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_8"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_8"
                                                    placeholder="" readonly></td>

                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_8"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_8"
                                                    placeholder="" readonly></td>

                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_8"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_8"
                                                    placeholder="" readonly></td>

                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_8"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_8"
                                                    placeholder="" readonly></td>

                                            <td>8</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_8"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_8"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_8"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_8"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 9  --}}
                                        <tr>
                                            <td>9</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_9"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_9"
                                                    placeholder="" readonly></td>

                                            <td>9</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_9"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_9"
                                                    placeholder="" readonly></td>

                                            <td>9</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_9"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_9"
                                                    placeholder="" readonly></td>

                                            <td>9</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_9"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_9"
                                                    placeholder="" readonly></td>

                                            <td>9</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_9"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_9"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_9"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_9"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 10  --}}
                                        <tr>
                                            <td>10</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_10"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_10"
                                                    placeholder="" readonly></td>

                                            <td>10</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_10"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_10"
                                                    placeholder="" readonly></td>

                                            <td>10</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_10"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_10"
                                                    placeholder="" readonly></td>

                                            <td>10</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_10"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_10"
                                                    placeholder="" readonly></td>

                                            <td>10</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_10"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_10"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_10"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_10"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 11  --}}
                                        <tr>
                                            <td>11</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_11"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_11"
                                                    placeholder="" readonly></td>

                                            <td>11</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_11"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_11"
                                                    placeholder="" readonly></td>

                                            <td>11</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_11"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_11"
                                                    placeholder="" readonly></td>

                                            <td>11</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_11"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_11"
                                                    placeholder="" readonly></td>

                                            <td>11</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_11"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_11"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_11"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_11"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 12  --}}
                                        <tr>
                                            <td>12</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_12"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_12"
                                                    placeholder="" readonly></td>

                                            <td>12</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_12"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_12"
                                                    placeholder="" readonly></td>

                                            <td>12</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_12"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_12"
                                                    placeholder="" readonly></td>

                                            <td>12</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_12"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_12"
                                                    placeholder="" readonly></td>

                                            <td>12</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_12"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_12"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_12"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_12"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 13  --}}
                                        <tr>
                                            <td>13</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_13"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_13"
                                                    placeholder="" readonly></td>

                                            <td>13</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_13"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_13"
                                                    placeholder="" readonly></td>

                                            <td>13</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_13"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_13"
                                                    placeholder="" readonly></td>

                                            <td>13</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_13"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_13"
                                                    placeholder="" readonly></td>

                                            <td>13</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_13"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_13"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_13"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_13"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 14  --}}
                                        <tr>
                                            <td>14</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_14"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_14"
                                                    placeholder="" readonly></td>

                                            <td>14</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_14"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_14"
                                                    placeholder="" readonly></td>

                                            <td>14</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_14"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_14"
                                                    placeholder="" readonly></td>

                                            <td>14</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_14"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_14"
                                                    placeholder="" readonly></td>

                                            <td>14</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_14"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_14"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_14"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_14"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 15  --}}
                                        <tr>
                                            <td>15</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_15"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_15"
                                                    placeholder="" readonly></td>

                                            <td>15</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_15"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_15"
                                                    placeholder="" readonly></td>

                                            <td>15</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_15"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_15"
                                                    placeholder="" readonly></td>

                                            <td>15</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_15"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_15"
                                                    placeholder="" readonly></td>

                                            <td>15</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_15"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_15"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_15"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_15"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 16  --}}
                                        <tr>
                                            <td>16</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_16"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_16"
                                                    placeholder="" readonly></td>

                                            <td>16</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_16"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_16"
                                                    placeholder="" readonly></td>

                                            <td>16</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_16"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_16"
                                                    placeholder="" readonly></td>

                                            <td>16</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_16"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_16"
                                                    placeholder="" readonly></td>

                                            <td>16</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_16"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_16"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_16"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_16"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 17  --}}
                                        <tr>
                                            <td>17</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_17"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_17"
                                                    placeholder="" readonly></td>

                                            <td>17</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_17"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_17"
                                                    placeholder="" readonly></td>

                                            <td>17</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_17"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_17"
                                                    placeholder="" readonly></td>

                                            <td>17</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_17"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_17"
                                                    placeholder="" readonly></td>

                                            <td>17</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_17"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_17"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_17"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_17"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 18  --}}
                                        <tr>
                                            <td>18</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_18"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_18"
                                                    placeholder="" readonly></td>

                                            <td>18</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_18"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_18"
                                                    placeholder="" readonly></td>

                                            <td>18</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_18"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_18"
                                                    placeholder="" readonly></td>

                                            <td>18</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_18"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_18"
                                                    placeholder="" readonly></td>

                                            <td>18</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_18"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_18"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_18"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_18"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 19  --}}
                                        <tr>
                                            <td>19</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_19"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_19"
                                                    placeholder="" readonly></td>

                                            <td>19</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_19"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_19"
                                                    placeholder="" readonly></td>

                                            <td>19</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_19"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_19"
                                                    placeholder="" readonly></td>

                                            <td>19</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_19"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_19"
                                                    placeholder="" readonly></td>

                                            <td>19</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_19"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_19"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_19"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_19"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 20  --}}
                                        <tr>
                                            <td>20</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_20"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_20"
                                                    placeholder="" readonly></td>

                                            <td>20</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_20"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_20"
                                                    placeholder="" readonly></td>

                                            <td>20</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_20"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_20"
                                                    placeholder="" readonly></td>

                                            <td>20</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_20"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_20"
                                                    placeholder="" readonly></td>

                                            <td>20</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_20"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_20"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_20"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_20"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 21  --}}
                                        <tr>
                                            <td>21</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_21"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_21"
                                                    placeholder="" readonly></td>

                                            <td>21</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_21"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_21"
                                                    placeholder="" readonly></td>

                                            <td>21</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_21"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_21"
                                                    placeholder="" readonly></td>

                                            <td>21</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_21"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_21"
                                                    placeholder="" readonly></td>

                                            <td>21</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_21"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_21"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_21"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_21"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 22  --}}
                                        <tr>
                                            <td>22</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_22"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_22"
                                                    placeholder="" readonly></td>

                                            <td>22</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_22"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_22"
                                                    placeholder="" readonly></td>

                                            <td>22</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_22"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_22"
                                                    placeholder="" readonly></td>

                                            <td>22</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_22"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_22"
                                                    placeholder="" readonly></td>

                                            <td>22</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_22"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_22"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_22"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_22"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 23  --}}
                                        <tr>
                                            <td>23</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_23"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_23"
                                                    placeholder="" readonly></td>

                                            <td>23</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_23"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_23"
                                                    placeholder="" readonly></td>

                                            <td>23</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_23"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_23"
                                                    placeholder="" readonly></td>

                                            <td>23</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_23"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_23"
                                                    placeholder="" readonly></td>

                                            <td>23</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_23"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_23"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_23"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_23"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 24  --}}
                                        <tr>
                                            <td>24</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_24"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_24"
                                                    placeholder="" readonly></td>

                                            <td>24</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_24"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_24"
                                                    placeholder="" readonly></td>

                                            <td>24</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_24"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_24"
                                                    placeholder="" readonly></td>

                                            <td>24</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_24"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_24"
                                                    placeholder="" readonly></td>

                                            <td>24</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_24"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_24"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_24"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_24"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 25  --}}
                                        <tr>
                                            <td>25</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_25"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_25"
                                                    placeholder="" readonly></td>

                                            <td>25</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_25"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_25"
                                                    placeholder="" readonly></td>

                                            <td>25</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_25"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_25"
                                                    placeholder="" readonly></td>

                                            <td>25</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_25"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_25"
                                                    placeholder="" readonly></td>

                                            <td>25</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_25"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_25"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_25"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_25"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 26  --}}
                                        <tr>
                                            <td>26</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_26"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_26"
                                                    placeholder="" readonly></td>

                                            <td>26</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_26"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_26"
                                                    placeholder="" readonly></td>

                                            <td>26</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_26"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_26"
                                                    placeholder="" readonly></td>

                                            <td>26</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_26"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_26"
                                                    placeholder="" readonly></td>

                                            <td>26</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_26"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_26"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_26"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_26"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 27  --}}
                                        <tr>
                                            <td>27</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_27"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_27"
                                                    placeholder="" readonly></td>

                                            <td>27</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_27"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_27"
                                                    placeholder="" readonly></td>

                                            <td>27</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_27"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_27"
                                                    placeholder="" readonly></td>

                                            <td>27</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_27"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_27"
                                                    placeholder="" readonly></td>

                                            <td>27</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_27"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_27"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_27"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_27"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 28  --}}
                                        <tr>
                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_28"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 28  --}}
                                        {{-- <tr>
                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_28"
                                                    placeholder="" readonly></td>

                                            <td>28</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_28"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_28"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_28"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_28"
                                                    placeholder="" readonly></td>
                                        </tr> --}}
                                        {{-- Day 29  --}}
                                        <tr>
                                            <td>29</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_29"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_29"
                                                    placeholder="" readonly></td>

                                            <td>29</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_29"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_29"
                                                    placeholder="" readonly></td>

                                            <td>29</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_29"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_29"
                                                    placeholder="" readonly></td>

                                            <td>29</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_29"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_29"
                                                    placeholder="" readonly></td>

                                            <td>29</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_29"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_29"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_29"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_29"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 30  --}}
                                        <tr>
                                            <td>30</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_30"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_30"
                                                    placeholder="" readonly></td>

                                            <td>30</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_30"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_30"
                                                    placeholder="" readonly></td>

                                            <td>30</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_30"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_30"
                                                    placeholder="" readonly></td>

                                            <td>30</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_30"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_30"
                                                    placeholder="" readonly></td>

                                            <td>30</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_30"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_30"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_30"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_30"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day 31  --}}
                                        <tr>
                                            <td>31</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_31"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_31"
                                                    placeholder="" readonly></td>

                                            <td>31</td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_31"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_31"
                                                    placeholder="" readonly></td>

                                            <td>31</td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_31"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_31"
                                                    placeholder="" readonly></td>

                                            <td>31</td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_31"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_31"
                                                    placeholder="" readonly></td>

                                            <td>31</td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_31"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_31"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_31"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_31"
                                                    placeholder="" readonly></td>
                                        </tr>
                                        {{-- Day sum  --}}
                                        <tr>
                                            <td>Sum</td>
                                            <td><input type="text" class="form-control" name="mo_total_goal_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_sales_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_inv_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_lines_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_LPI_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_total_dlr_inv_sum"
                                                    placeholder="" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_sales_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_inv_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_lines_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_LPI_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_one_dlr_inv_sum"
                                                    placeholder="" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_sales_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_inv_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_lines_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_LPI_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_two_dlr_inv_sum"
                                                    placeholder="" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_sales_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_inv_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_lines_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_LPI_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_three_dlr_inv_sum"
                                                    placeholder="" readonly></td>

                                            <td></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_sales_sum"
                                                    placeholder="$0.00" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_inv_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_lines_sum"
                                                    placeholder="0" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_LPI_sum"
                                                    placeholder="" readonly></td>
                                            <td><input type="text" class="form-control" name="mo_name_four_dlr_inv_sum"
                                                    placeholder="" readonly></td>
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
                                                placeholder="$0.00" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">SALE</span>
                                            <input type="text" name="total_dept_sale" class="form-control"
                                                placeholder="" readonly>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">GOAL PACE</span>
                                            <input type="text" name="total_dept_pace" class="form-control"
                                                placeholder="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_one_input_group"></span>
                                                        <input type="text" name="name_one_dept_goal" class="form-control" value="0.00"
                                                            placeholder="$0.00" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_one_dept_sale" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_one_dept_pace" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_two_input_group"></span>
                                                        <input type="text" name="name_two_dept_goal" class="form-control" value="0.00"
                                                            placeholder="$0.00" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_two_dept_sale" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_two_dept_pace" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_three_input_group"></span>
                                                        <input type="text" name="name_three_dept_goal" class="form-control" value="0.00"
                                                            placeholder="$0.00" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_three_dept_sale" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_three_dept_pace" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <hr>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                        <span class="input-group-text name_four_input_group"></span>
                                                        <input type="text" name="name_four_dept_goal" class="form-control" value="0.00"
                                                            placeholder="$0.00" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">SALE</span>
                                                        <input type="text" name="name_four_dept_sale" class="form-control"
                                                            placeholder="" readonly>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">GOAL PACE</span>
                                                        <input type="text" name="name_four_dept_pace" class="form-control"
                                                            placeholder="" readonly>
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
                                                placeholder="" readonly>
                                            <input type="text" name="sales_standing_one_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="sales_standing_name_two" class="form-control"
                                                        placeholder="" readonly>
                                                <input type="text" name="sales_standing_two_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="sales_standing_name_three" class="form-control"
                                                    placeholder="" readonly>
                                                <input type="text" name="sales_standing_three_value" class="form-control"
                                                    placeholder="$0.00">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="sales_standing_name_four" class="form-control"
                                                            placeholder="" readonly>
                                                    <input type="text" name="sales_standing_four_value" class="form-control"
                                                    placeholder="$0.00">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                        <h4>$ Per Inv</h4>
                                        <hr>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="dlr_per_inv_name_one" class="form-control"
                                                placeholder="" readonly>
                                            <input type="text" name="dlr_per_inv_one_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="dlr_per_inv_name_two" class="form-control"
                                                        placeholder="" readonly>
                                                <input type="text" name="dlr_per_inv_two_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="dlr_per_inv_name_three" class="form-control"
                                                    placeholder="" readonly>
                                                <input type="text" name="dlr_per_inv_three_value" class="form-control"
                                                    placeholder="$0.00">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="dlr_per_inv_name_four" class="form-control"
                                                            placeholder="" readonly>
                                                    <input type="text" name="dlr_per_inv_four_value" class="form-control"
                                                    placeholder="$0.00">
                                            </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12">
                                        <h4>LPI</h4>
                                        <hr>
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" name="total_LPI_name_one" class="form-control"
                                                placeholder="" readonly>
                                            <input type="text" name="total_LPI_one_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>
                                        <div class="input-group mb-3">
                                                <input type="text" name="total_LPI_name_two" class="form-control"
                                                        placeholder="" readonly>
                                                <input type="text" name="total_LPI_two_value" class="form-control"
                                                placeholder="$0.00">
                                        </div>

                                        <div class="input-group mb-3">
                                                <input type="text" name="total_LPI_name_three" class="form-control"
                                                    placeholder="" readonly>
                                                <input type="text" name="total_LPI_three_value" class="form-control"
                                                    placeholder="$0.00">
                                            </div>
                                            <div class="input-group mb-3">
                                                    <input type="text" name="total_LPI_name_four" class="form-control"
                                                            placeholder="" readonly>
                                                    <input type="text" name="total_LPI_four_value" class="form-control"
                                                    placeholder="$0.00">
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
                    <div id="collapseFour" class="accordion-collapse collapse foatingScrollbar" aria-labelledby="headingFour">
                        <div class="accordion-body">
                                <div class="table-responsive ">
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
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_1" value="1"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_1"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_1"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_1" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_1"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_1"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_1" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_1"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_1" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_1" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_1" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 2  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_2" value="2"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_2"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_2"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_2" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_2"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_2"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_2" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_2"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_2" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_2" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_2" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 3  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_3" value="3"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_3"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_3"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_3" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_3"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_3"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_3" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_3"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_3" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_3" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_3" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 4  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_4" value="4"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_4"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_4"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_4" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_4"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_4"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_4" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_4"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_4" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_4" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_4" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 5  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_5" value="5"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_5"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_5"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_5" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_5"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_5"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_5" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_5"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_5" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_5" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_5" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 6  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_6" value="6"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_6"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_6"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_6" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_6"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_6"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_6" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_6"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_6" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_6" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_6" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 7  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_7" value="7"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_7"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_7"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_7" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_7"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_7"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_7" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_7"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_7" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_7" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_7" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 8  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_8" value="8"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_8"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_8"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_8" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_8"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_8"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_8" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_8"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_8" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_8" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_8" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 9  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_9" value="9"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_9"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_9"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_9" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_9"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_9"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_9" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_9"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_9" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_9" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_9" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 10  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_10" value="10"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_10"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_10"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_10" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_10"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_10"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_10" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_10"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_10" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_10" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_10" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 11  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_11" value="11"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_11"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_11"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_11" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_11"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_11"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_11" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_11"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_11" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_11" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_11" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 12  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_12" value="12"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_12"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_12"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_12" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_12"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_12"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_12" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_12"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_12" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_12" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_12" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 13  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_13" value="13"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_13"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_13"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_13" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_13"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_13"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_13" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_13"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_13" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_13" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_13" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 14  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_14" value="14"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_14"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_14"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_14" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_14"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_14"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_14" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_14"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_14" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_14" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_14" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 15  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_15" value="15"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_15"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_15"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_15" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_15"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_15"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_15" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_15"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_15" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_15" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_15" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 16  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_16" value="16"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_16"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_16"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_16" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_16"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_16"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_16" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_16"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_16" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_16" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_16" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 17  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_17" value="17"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_17"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_17"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_17" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_17"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_17"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_17" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_17"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_17" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_17" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_17" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 18  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_18" value="18"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_18"
                                                                placeholder="$0.00"  readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_18"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_18" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_18"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_18"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_18" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_18"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_18" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_18" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_18" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 19  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_19" value="19"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_19"
                                                                placeholder="$0.00"  readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_19"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_19" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_19"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_19"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_19" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_19"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_19" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_19" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_19" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 20  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_20" value="20"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_20"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_20"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_20" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_20"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_20"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_20" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_20"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_20" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_20" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_20" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 21  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_21" value="21"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_21"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_21"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_21" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_21"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_21"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_21" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_21"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_21" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_21" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_21" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 22  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_22" value="22"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_22"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_22"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_22" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_22"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_22"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_22" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_22"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_22" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_22" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_22" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 23  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_23" value="23"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_23"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_23"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_23" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_23"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_23"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_23" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_23"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_23" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_23" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_23" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 24  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_24" value="24"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_24"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_24"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_24" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_24"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_24"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_24" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_24"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_24" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_24" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_24" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 25  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_25" value="25"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_25"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_25"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_25" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_25"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_25"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_25" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_25"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_25" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_25" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_25" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 26  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_26" value="26"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_26"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_26"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_26" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_26"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_26"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_26" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_26"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_26" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_26" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_26" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 27  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_27" value="27"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_27"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_27"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_27" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_27"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_27"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_27" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_27"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_27" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_27" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_27" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 28  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_28" value="28"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_28"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_28"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_28" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_28"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_28"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_28" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_28"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_28" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_28" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_28" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 29  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_29" value="29"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_29"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_29"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_29" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_29"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_29"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_29" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_29"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_29" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_29" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_29" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 30  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_30" value="30"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_30"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_30"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_30" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_30"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_30"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_30" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_30"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_30" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_30" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_30" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day 31  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_31" value="31"
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_31"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_31"></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_31" placeholder="">
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_31"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_31"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_31" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_31"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_31" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_31" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_31" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                    {{-- Day sum  --}}
                                                    <tr>
                                                        <td><input type="number" class="form-control" name="daily_date_sum" value=""
                                                                readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_retail_sum"
                                                                placeholder="$0.00" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly1_sum" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_cost_sum"
                                                                placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_margin_sum"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_sales_goal_sum"
                                                                placeholder="" readonly></td>
                
                                                        <td><input type="text" class="form-control" name="daily_ou1_sum" placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_current_sum"
                                                                placeholder="" readonly></td>
                                                        <td><input type="text" class="form-control" name="daily_ly2_sum" placeholder="" readonly>
                                                        </td>
                
                                                        <td><input type="text" class="form-control" name="daily_goal_sum"
                                                                placeholder="" readonly>
                                                        </td>
                                                        <td><input type="text" class="form-control" name="daily_ou2_sum" placeholder="" readonly>
                                                        </td>
                                                    </tr>
                                                </tbody>
                
                
                                            </table>
                                </div>
                            

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Tracking</span>
                                            <input type="text" name="daily_tracking" class="form-control"
                                                placeholder="$0.00" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual</span>
                                            <input type="text" name="daily_actual" class="form-control"
                                                placeholder="$0.00" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Actual % Of Goal</span>
                                            <input type="text" name="daily_actual_goal" class="form-control"
                                                placeholder="$0.00" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">On Track</span>
                                            <input type="text" name="daily_on_track" class="form-control"
                                                placeholder="$0.00" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">No. of Business Days</span>
                                            <input type="text" name="daily_no_business_days" class="form-control"
                                            value="31" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Above/Below On Track</span>
                                            <input type="text" name="daily_on_above_below" class="form-control"
                                                placeholder="$0.00" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center my-5">
                <button class="btn btn-primary px-5" type="submit" style="">Save</button>
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
