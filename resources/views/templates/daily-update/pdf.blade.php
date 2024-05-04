<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #2E72F6;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            border: 1px solid #ccc;
            text-align: left;
            font-size: 12px;
        }

    </style>

</head>

<body>
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

<div class="row print-card mb-5">

    <div class="col-12 text-center">
        <div class="">
            <img class="me-2" src="{{ public_path('frontend/img/logo.png')}}" alt="" width="80px">
            <h3 class="display-3"> KYI - Daily Sales Update</h3>
            <hr>
        </div>
    </div>
    <div class="col-lg-12">

        <div class="container">
            <h3 class="text-center text-primary py-2"> Monthly Goal</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$dailyUpdateData->name_one}}</td>
                        <td>${{$dailyUpdateData->amount_one}}</td>
                    </tr>
                    <tr>
                        <td>{{$dailyUpdateData->name_two}}</td>
                        <td>${{$dailyUpdateData->amount_two}}</td>
                    </tr>
                    <tr>
                        <td>{{$dailyUpdateData->name_three}}</td>
                        <td>${{$dailyUpdateData->amount_three}}</td>
                    </tr>
                    <tr>
                        <td>{{$dailyUpdateData->name_four}}</td>
                        <td>${{$dailyUpdateData->amount_four}}</td>
                    </tr>
                    <tr>
                        <td> <b>Total</b></td>
                        <td><b>${{$dailyUpdateData->total_amount}}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div class="col-lg-12">
        <h3 class="text-center text-primary py-3">Input</h3>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">Goals</th>
                            <th rowspan="2">Day</th>
                            <th rowspan="2">Date</th>
                            <th colspan="3">{{$dailyUpdateData->name_one}}</th>
                            <th colspan="3">{{$dailyUpdateData->name_two}}</th>
                            <th colspan="3">{{$dailyUpdateData->name_three}}</th>
                            <th colspan="3">{{$dailyUpdateData->name_four}}</th>
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
                        @for ($day = 1; $day <= 31; $day++) <tr>
                            <td>{{ isset($goals[$day]) && $goals[$day] > 0 ? '$' . $goals[$day] : ($goals[$day] ?? '') }}</td>
                            <td>{{ $days[$day] ?? '' }}</td>
                            <td>{{ $day }}</td>

                            <td>{{ isset($name_one_sales[$day]) && $name_one_sales[$day] > 0 ? '$' . $name_one_sales[$day] : ($name_one_sales[$day] ?? '') }}</td>
                            <td>{{ $name_one_inv[$day] ?? '' }}</td>
                            <td>{{ $name_one_lines[$day] ?? '' }}</td>

                            <td>{{ isset($name_two_sales[$day]) && $name_two_sales[$day] > 0 ? '$' . $name_two_sales[$day] : ($name_two_sales[$day] ?? '') }}</td>
                            <td>{{ $name_two_inv[$day] ?? '' }}</td>
                            <td>{{ $name_two_lines[$day] ?? '' }}</td>

                            <td>{{ isset($name_three_sales[$day]) && $name_three_sales[$day] > 0 ? '$' . $name_three_sales[$day] : ($name_three_sales[$day] ?? '') }}</td>
                            <td>{{ $name_three_inv[$day] ?? '' }}</td>
                            <td>{{ $name_three_lines[$day] ?? '' }}</td>

                            <td>{{ isset($name_four_sales[$day]) && $name_four_sales[$day] > 0 ? '$' . $name_four_sales[$day] : ($name_four_sales[$day] ?? '') }}</td>
                            <td>{{ $name_four_inv[$day] ?? '' }}</td>
                            <td>{{ $name_four_lines[$day] ?? '' }}</td>
                            </tr>
                            @endfor

                    </tbody>
                    <tfoot>
                        <tr style="font-weight: bold">
                            <td>${{$dailyUpdateData->goals_sum}}</td>
                            <td>{{$dailyUpdateData->day_sum}}
                            </td>
                            <td>{{$dailyUpdateData->date_sum}}</td>

                            <td>${{$dailyUpdateData->name_one_sales_sum}}</td>
                            <td>{{$dailyUpdateData->name_one_inv_sum}}</td>
                            <td>{{$dailyUpdateData->name_one_lines_sum}}</td>

                            <td>${{$dailyUpdateData->name_two_sales_sum}}</td>
                            <td>{{$dailyUpdateData->name_two_inv_sum}}</td>
                            <td>{{$dailyUpdateData->name_two_lines_sum}}</td>

                            <td>${{$dailyUpdateData->name_three_sales_sum}}</td>
                            <td>{{$dailyUpdateData->name_three_inv_sum}}</td>
                            <td>{{$dailyUpdateData->name_three_lines_sum}}</td>

                            <td>${{$dailyUpdateData->name_four_sales_sum}}</td>
                            <td>{{$dailyUpdateData->name_four_inv_sum}}</td>
                            <td>{{$dailyUpdateData->name_four_lines_sum}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <h3 class="text-center text-primary py-3">Month Overview</h3>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th colspan="7">Total Department</th>
                            <th colspan="6">{{$dailyUpdateData->name_one}}</th>
                            <th colspan="6">{{$dailyUpdateData->name_two}}</th>
                            <th colspan="6">{{$dailyUpdateData->name_three}}</th>
                            <th colspan="6">{{$dailyUpdateData->name_four}}</th>
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

                        @for ($day = 1; $day <= 31; $day++) <tr>
                            <td>{{$day}}</td>
                            <td>${{ $mo_total_goal[$day] ?? '' }}</td>
                            <td>${{ $mo_total_sales[$day] ?? '' }}</td>
                            <td>{{ $mo_total_inv[$day] ?? '' }}</td>
                            <td>{{ $mo_total_lines[$day] ?? '' }}</td>
                            <td>{{ $mo_total_LPI[$day] ?? '' }}</td>
                            <td>{{ $mo_total_dlr_inv[$day] ?? '' }}</td>



                            <td>{{$day}}</td>
                            <td>${{ $mo_name_one_sales[$day] ?? '' }}</td>
                            <td>{{ $mo_name_one_inv[$day] ?? '' }}</td>
                            <td>{{ $mo_name_one_lines[$day] ?? '' }}</td>
                            <td>{{ $mo_name_one_LPI[$day] ?? '' }}</td>
                            <td>${{ $mo_name_one_dlr_inv[$day] ?? '' }}</td>

                            <td>{{$day}}</td>
                            <td>${{ $mo_name_two_sales[$day] ?? '' }}</td>
                            <td>{{ $mo_name_two_inv[$day] ?? '' }}</td>
                            <td>{{ $mo_name_two_lines[$day] ?? '' }}</td>
                            <td>{{ $mo_name_two_LPI[$day] ?? '' }}</td>
                            <td>${{ $mo_name_two_dlr_inv[$day] ?? '' }}</td>

                            <td>{{$day}}</td>
                            <td>${{ $mo_name_three_sales[$day] ?? '' }}</td>
                            <td>{{ $mo_name_three_inv[$day] ?? '' }}</td>
                            <td>{{ $mo_name_three_lines[$day] ?? '' }}</td>
                            <td>{{ $mo_name_three_LPI[$day] ?? '' }}</td>
                            <td>${{ $mo_name_three_dlr_inv[$day] ?? '' }}</td>

                            <td>{{$day}}</td>
                            <td>${{ $mo_name_four_sales[$day] ?? '' }}</td>
                            <td>{{ $mo_name_four_inv[$day] ?? '' }}</td>
                            <td>{{ $mo_name_four_lines[$day] ?? '' }}</td>
                            <td>{{ $mo_name_four_LPI[$day] ?? '' }}</td>
                            <td>${{ $mo_name_four_dlr_inv[$day] ?? '' }}</td>
                            </tr>

                            @endfor


                            {{-- Day sum  --}}
                            <tr>
                                <td>Sum</td>
                                <td>${{$dailyUpdateData->mo_total_goal_sum}}</td>
                                <td>${{$dailyUpdateData->mo_total_sales_sum}}</td>
                                <td>{{$dailyUpdateData->mo_total_inv_sum}}</td>
                                <td>{{$dailyUpdateData->mo_total_lines_sum}}</td>
                                <td>{{$dailyUpdateData->mo_total_LPI_sum}}</td>
                                <td>${{$dailyUpdateData->mo_total_dlr_inv_sum}}</td>

                                <td></td>
                                <td>{{$dailyUpdateData->mo_name_one_sales_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_one_inv_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_one_lines_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_one_LPI_sum}}</td>
                                <td>${{$dailyUpdateData->mo_name_one_dlr_inv_sum}}</td>

                                <td></td>
                                <td>{{$dailyUpdateData->mo_name_two_sales_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_two_inv_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_two_lines_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_two_LPI_sum}}</td>
                                <td>${{$dailyUpdateData->mo_name_two_dlr_inv_sum}}</td>

                                <td></td>
                                <td>{{$dailyUpdateData->mo_name_three_sales_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_three_inv_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_three_lines_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_three_LPI_sum}}</td>
                                <td>${{$dailyUpdateData->mo_name_three_dlr_inv_sum}}</td>

                                <td></td>
                                <td>{{$dailyUpdateData->mo_name_four_sales_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_four_inv_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_four_lines_sum}}</td>
                                <td>{{$dailyUpdateData->mo_name_four_LPI_sum}}</td>
                                <td>${{$dailyUpdateData->mo_name_four_dlr_inv_sum}}</td>
                            </tr>
                    </tbody>


                </table>
            </div>

            <div class="row mt-5">
                <div class="col-lg-8 col-10 mx-auto">
                    <div class="container">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>TOTAL DEPARTMENT GOAL</td>
                                    <td>${{$dailyUpdateData->total_dept_goal}}</td>
                                </tr>
                                <tr>
                                    <td>SALE</td>
                                    <td>${{$dailyUpdateData->total_dept_sale}}</td>
                                </tr>
                                <tr>
                                    <td>GOAL PACE</td>
                                    <td>{{$dailyUpdateData->total_dept_pace}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-lg-6 col-12">
                    <div class="container">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_one}}</td>
                                    <td>${{$dailyUpdateData->name_one_dept_goal}}</td>
                                </tr>
                                <tr>
                                    <td>SALE</td>
                                    <td>${{$dailyUpdateData->name_one_dept_sale}}</td>
                                </tr>
                                <tr>
                                    <td>GOAL PACE</td>
                                    <td>{{$dailyUpdateData->name_one_dept_pace}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6 col-12">
                    <div class="container">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_two}}</td>
                                    <td>${{$dailyUpdateData->name_two_dept_goal}}</td>
                                </tr>
                                <tr>
                                    <td>SALE</td>
                                    <td>${{$dailyUpdateData->name_two_dept_sale}}</td>
                                </tr>
                                <tr>
                                    <td>GOAL PACE</td>
                                    <td>{{$dailyUpdateData->name_two_dept_pace}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6 col-12">
                    <div class="container">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_three}}</td>
                                    <td>${{$dailyUpdateData->name_three_dept_goal}}</td>
                                </tr>
                                <tr>
                                    <td>SALE</td>
                                    <td>${{$dailyUpdateData->name_three_dept_sale}}</td>
                                </tr>
                                <tr>
                                    <td>GOAL PACE</td>
                                    <td>{{$dailyUpdateData->name_three_dept_pace}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="col-lg-6 col-12">
                    <div class="container">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_four}}</td>
                                    <td>${{$dailyUpdateData->name_four_dept_goal}}</td>
                                </tr>
                                <tr>
                                    <td>SALE</td>
                                    <td>${{$dailyUpdateData->name_four_dept_sale}}</td>
                                </tr>
                                <tr>
                                    <td>GOAL PACE</td>
                                    <td>{{$dailyUpdateData->name_four_dept_pace}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>



                <div class="row mt-5">
                    <div class="col-lg-4 col-12">
                        <h4>Sales Standing</h4>
                        <hr>
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_one}}</td>
                                    <td>${{$dailyUpdateData->sales_standing_one_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_two}}</td>
                                    <td>${{$dailyUpdateData->sales_standing_two_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_three}}</td>
                                    <td>${{$dailyUpdateData->sales_standing_three_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_four}}</td>
                                    <td>${{$dailyUpdateData->sales_standing_four_value}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-4 col-12">
                        <h4>$ Per Inv</h4>
                        <hr>
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_one}}</td>
                                    <td>${{$dailyUpdateData->dlr_per_inv_one_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_two}}</td>
                                    <td>${{$dailyUpdateData->dlr_per_inv_two_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_three}}</td>
                                    <td>${{$dailyUpdateData->dlr_per_inv_three_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_four}}</td>
                                    <td>${{$dailyUpdateData->dlr_per_inv_four_value}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4 col-12">
                        <h4>LPI</h4>
                        <hr>
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>{{$dailyUpdateData->name_one}}</td>
                                    <td>{{$dailyUpdateData->total_LPI_one_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_two}}</td>
                                    <td>{{$dailyUpdateData->total_LPI_two_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_three}}</td>
                                    <td>{{$dailyUpdateData->total_LPI_three_value}}</td>
                                </tr>
                                <tr>
                                    <td>{{$dailyUpdateData->name_four}}</td>
                                    <td>{{$dailyUpdateData->total_LPI_four_value}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>


    </div>
    <div class="col-lg-12">
        <h3 class="text-center text-primary py-3">Daily</h3>
        <div class="container-fluid">
            <div class="table-responsive">
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
                        @for ($day = 1; $day <= 31; $day++) <tr>
                            <td>{{$day}}</td>
                            <td>${{ $daily_retail[$day] ?? '' }}</td>
                            <td>{{ isset($daily_ly1[$day]) && $daily_ly1[$day] > 0 ? '$' . $daily_ly1[$day] : ($daily_ly1[$day] ?? '') }}</td>
                            <td>{{ isset($daily_cost[$day]) && $daily_cost[$day] > 0 ? '$' . $daily_cost[$day] : ($daily_cost[$day] ?? '') }}</td>
                            <td>{{ $daily_margin[$day] ?? '' }}</td>

                            <td>${{ $daily_sales_goal[$day] ?? '' }}</td>

                            <td>${{ $daily_ou1[$day] ?? '' }}
                            </td>
                            <td>${{ $daily_current[$day] ?? '' }}</td>
                            <td>${{ $daily_ly2[$day] ?? '' }}
                            </td>

                            <td>${{ $daily_goal[$day] ?? '' }}
                            </td>
                            <td>${{ $daily_ou2[$day] ?? '' }}
                            </td>
                            </tr>
                            @endfor

                            {{-- Day sum  --}}
                            <tr>
                                <td>${{$dailyUpdateData->daily_date_sum}}</td>
                                <td>${{$dailyUpdateData->daily_retail_sum}}</td>
                                <td>{{ isset($dailyUpdateData->daily_ly1_sum) && $dailyUpdateData->daily_ly1_sum > 0 ? '$' . $dailyUpdateData->daily_ly1_sum : ($dailyUpdateData->daily_ly1_sum ?? '') }}</td>
                                <td>{{ isset($dailyUpdateData->daily_cost_sum) && $dailyUpdateData->daily_cost_sum > 0 ? '$' . $dailyUpdateData->daily_cost_sum : ($dailyUpdateData->daily_cost_sum ?? '') }}
                                </td>
                                <td>{{$dailyUpdateData->daily_margin_sum}}</td>

                                <td>${{$dailyUpdateData->daily_sales_goal_sum}}</td>

                                <td>${{$dailyUpdateData->daily_ou1_sum}}
                                </td>
                                <td>${{$dailyUpdateData->daily_current_sum}}</td>
                                <td>${{$dailyUpdateData->daily_ly2_sum}}
                                </td>

                                <td>${{$dailyUpdateData->daily_goal_sum}}
                                </td>
                                <td>${{$dailyUpdateData->daily_ou2_sum}}
                                </td>
                            </tr>
                    </tbody>


                </table>
                <br>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>Tracking</td>
                                    <td>${{$dailyUpdateData->daily_tracking}}</td>
                                </tr>
                                <tr>
                                    <td>Actual % Of Goal</td>
                                    <td>{{$dailyUpdateData->daily_actual_goal}}</td>
                                </tr>
                                <tr>
                                    <td>No. of Business Days</td>
                                    <td>{{$dailyUpdateData->daily_no_business_days}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-6 col-md-6 col-12">
                        <table class="table table-bordered" style="width: 100%">
                            <tbody>
                                <tr>
                                    <td>Actual</td>
                                    <td>${{$dailyUpdateData->daily_actual}}</td>
                                </tr>
                                <tr>
                                    <td>On Track</td>
                                    <td>${{$dailyUpdateData->daily_on_track}}</td>
                                </tr>
                                <tr>
                                    <td>Above/Below On Track</td>
                                    <td>${{$dailyUpdateData->daily_on_above_below}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>