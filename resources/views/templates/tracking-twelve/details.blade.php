@extends('layouts.avatar')
@section('title')
{{$forecastData->title}} - 12 Month Forecast | Know Your Inventory
@endsection
@section('avatar_content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@php

    $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

    $walkInData = json_decode($forecastData->walk_in, true);
    $webPurchaseData = json_decode($forecastData->web_purchase, true);
    $totalOneData = json_decode($forecastData->total_one, true);
    $estimatedPurchaseData = json_decode($forecastData->estimated_purchase, true);
    $totalTwoData = json_decode($forecastData->total_two, true);
    $perInvoiceData = json_decode($forecastData->per_invoice, true);
    $monthlyTotalData = json_decode($forecastData->monthly_total, true);
    $businessDaysData = json_decode($forecastData->business_days, true);
    $perDayData = json_decode($forecastData->per_day, true);
    $walkInPerDayData = json_decode($forecastData->walk_in_per_day, true);
@endphp

<div class="container">

    <div class="row print-card mb-5">
        <form action="{{ route('view.pdf.tracking.twelve', ['id' => $forecastData->id] )}}" method="post" target="__blank">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <img class="me-2" src="{{ asset('frontend/img/logo.png')}}" alt="" width="80px">
                    <h3> KYI - 12 Month Forecast</h3>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <h4 class="py-3">Department/Category: {{$forecastData->title}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-striped monthly-forcast">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Jan</th>
                                <th>Feb</th>
                                <th>Mar</th>
                                <th>Apr</th>
                                <th>May</th>
                                <th>Jun</th>
                                <th>Jul</th>
                                <th>Aug</th>
                                <th>Sep</th>
                                <th>Oct</th>
                                <th>Nov</th>
                                <th>Dec</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Walk-In Per Day Estimator</td>
                                
                                @foreach($months as $month)
                                    <td class="text-center">{{ $walkInPerDayData[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td># Business Days</td>
                                
                                @foreach($months as $month)
                                    <td class="text-center">{{ $businessDaysData[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Walk-In</td>
                                
                                @foreach($months as $month)
                                    <td class="text-center">{{ $walkInData[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            
                            {{-- <tr>
                                <td>Web Purchase</td>
                                
                                @foreach($months as $month)
                                    <td>{{ $webPurchaseData[$month] ?? '' }}</td>
                                @endforeach
                            </tr> --}}
                            <tr>
                                <td>Total</td>
                                
                                @foreach($months as $month)
                                    <td class="text-center">{{ $totalOneData[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Estimated Purchase %</td>
                                @foreach($months as $month)
                                    <td class="text-center">{{ isset($estimatedPurchaseData[$month]) ? $estimatedPurchaseData[$month] . '%' : '' }}</td>
                                @endforeach
                            </tr>
                            
                            <tr>
                                <td>Total</td>
                                
                                @foreach($months as $month)
                                    <td class="text-center">{{ $totalTwoData[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>$ Per Invoice</td>
                                @foreach($months as $month)
                                    <td class="text-center">{{ isset($perInvoiceData[$month]) ? '$' . $perInvoiceData[$month] : '' }}</td>
                                @endforeach
                            </tr>                        
                            <tr>
                                <td>Monthly Total Sales</td>
                                @foreach($months as $month)
                                    <td class="text-center">{{ isset($monthlyTotalData[$month]) ? '$' . $monthlyTotalData[$month] : '' }}</td>
                                @endforeach
                            </tr>
                            
                            <tr>
                                <td>$ Per Days</td>
                                @foreach($months as $month)
                                    <td class="text-center">{{ isset($perDayData[$month]) ? '$' . $perDayData[$month] : '' }}</td>
                                @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

    </div>
    <div class="text-center">
        <div class="btn-group text-center my-5">
            <button class="btn btn-primary px-3" type="submit">Download PDF</button> <button class="btn btn-secondary px-5" type="button" onclick="printCard()">Print PDF</button>
        </div>
    </div>
    
</form>
</div>

@endsection
