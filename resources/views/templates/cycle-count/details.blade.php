@extends('layouts.avatar')
@section('title')
{{$cycleData->title}} - Cycle Count | Know Your Inventory
@endsection
@section('avatar_content')

@php
    $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'total'];

    $titleData = [];
    $itemsData = [];
    $amountData = [];

    for ($i = 1; $i <= 28; $i++) {
        $titleData[$i] = $cycleData->{'category_'.$i.'_title'};
        $itemsData[$i] = json_decode($cycleData->{'category_'.$i.'_items'}, true);
        $amountData[$i] = json_decode($cycleData->{'category_'.$i.'_amount'}, true);
    }
@endphp

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<style>
    .table.cycle-count tr td {
        padding: 0px !important;
        text-align: center !important
    }
</style>

<div class="container">

    <div class="row print-card mb-5">
        <form action="{{ route('view.pdf.cycle.count', ['id' => $cycleData->id] )}}" method="post" target="__blank">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <img class="me-2" src="{{ asset('frontend/img/logo.png')}}" alt="" width="80px">
                    <h3 class="display-3"> KYI - Cycle Count</h3>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <h4 class="pt-2">Department/Category: {{$cycleData->title}}</h4>
                <p class="mb-1">INV $ Adjustment: {{$cycleData->inv_adjustment}}</p>
                <p class="mb-1">SKU's Counted: {{$cycleData->sku_count}}</p>
                <div class="table-responsive">
                    <table class="table bootstrap-table-sticky-header table-bordered table-condensed table-striped cycle-count" id="categoryTable">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th></th>
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
                                <th>Totals</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 28; $i++)
                                <tr>
                                    <td rowspan="2" class="cycle-count-first-row">
                                        {{ $titleData[$i] ?? '' }}
                                    </td>
                                    <td><p>Items</p></td>
                                    @foreach($months as $month)
                                        <td>{{ $itemsData[$i][$month] ?? '' }}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td><p>$ + / -</p></td>
                                    @foreach($months as $month)
                                        <td>{{ $amountData[$i][$month] ?? '' }}</td>
                                    @endforeach
                                </tr>
                            @endfor
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
