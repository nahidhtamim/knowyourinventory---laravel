@extends('layouts.avatar')
@section('title')
Edit {{$cycleData->title}} - Cycle Count | Know Your Inventory
@endsection
@section('avatar_content')

<style>
    td{
        min-width: 40px;
    }

    .table.table-bordered.table-condensed input.form-control{
        min-width: 120px;
        font-size: 14px !important
    }
    .table-container {
      max-height: 400px; /* Set a max height for the table container to enable scrolling */
      overflow-y: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
    thead th {
      position: sticky;
      top: 0;
      background-color: #f2f2f2;
    }
</style>
@php
$months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'total'];

$titleData = [];
$itemsData = [];
$amountData = [];

for ($i = 1; $i <= 28; $i++) { $titleData[$i]=$cycleData->{'category_'.$i.'_title'};
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
            <form action="{{ route('update.cycle.count', ['id' => $cycleData->id] )}}" method="POST" id="dataEntryForm">
                @csrf
                
                <div class="col-12 text-center">
                    <div class=" sticky-container">
                        <h1 class="display-3">Cycle Count</h1>
                        <div class="col-12 text-center">
                            <div class="py-5">
                                <label for="title">Department/Category</label>
                                <input type="text" class="form-control" name="title" value="{{$cycleData->title}}" required>
                            </div>
                        </div>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>INV $ Adjustment</th>
                                    <th>SKU's Counted</th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control inv_adjustment" name="inv_adjustment" value="{{$cycleData->inv_adjustment}}" readonly></td>
                                    <td><input type="text" class="form-control sku_count" name="sku_count" value="{{$cycleData->sku_count}}" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table
                            class="table bootstrap-table-sticky-header table-bordered table-condensed table-striped cycle-count"
                            id="categoryTable">
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
                                @for ($i = 1; $i <= 28; $i++) <tr>
                                    <td rowspan="2" class="cycle-count-first-row">
                                        <input type="text" class="form-control category_{{$i}}" name="category_{{$i}}" value="{{ $titleData[$i] ?? '' }}">
                                    </td>
                                    <td>
                                        <p>Items</p>
                                    </td>
                                    @foreach($months as $month)
                                    <td><input type="text" class="form-control cat_{{$i}}_{{$month}}_item @if($month == 'total') total_items @endif" name="cat_{{$i}}_{{$month}}_item" value="{{ $itemsData[$i][$month] ?? '' }}"></td>
                                    @endforeach
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>$ + / -</p>
                                        </td>
                                        @foreach($months as $month)
                                        <td><input type="text" class="form-control cat_{{$i}}_{{$month}}_amnt @if($month == 'total') total_amount @endif" name="cat_{{$i}}_{{$month}}_amnt" value="{{ $amountData[$i][$month] ?? '' }}"></td>
                                        @endforeach
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center my-5">
                    <button class="btn btn-primary px-5" type="submit">Save</button>
                    <a href="{{ route('cycle.count.details', ['id' => $cycleData->id] )}}"
                        class="btn btn-secondary px-5">View</a>
                </div>
            </form>
        </div>
        
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Add the following script to calculate totals -->
    <script>
        // Run the script when the document is ready
        $(document).ready(function () {

            // Helper function to get the month abbreviation
            function getMonthAbbreviation(month) {
                const monthNames = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov',
                    'dec'
                ];
                return monthNames[month - 1];
            }

            // Iterate over each category
            for (let i = 1; i <= 24; i++) {
                // Calculate total when any monthly input changes
                $('.cat_' + i + '_jan_item, .cat_' + i + '_feb_item, .cat_' + i + '_mar_item, .cat_' + i +
                    '_apr_item, .cat_' + i + '_may_item, .cat_' + i + '_jun_item, .cat_' + i +
                    '_jul_item, .cat_' + i + '_aug_item, .cat_' + i + '_sep_item, .cat_' + i +
                    '_oct_item, .cat_' + i + '_nov_item, .cat_' + i + '_dec_item').on('input', function () {
                    let total = 0;
                    // Sum up monthly values
                    for (let month = 1; month <= 12; month++) {
                        total += parseFloat($('.cat_' + i + '_' + getMonthAbbreviation(month) + '_item')
                            .val()) || 0;
                    }
                    // Set the total value
                    $('.cat_' + i + '_total_item').val(total);
                    updateSkuCount();
                });

                // Calculate total when any monthly input changes
                $('.cat_' + i + '_jan_amnt, .cat_' + i + '_feb_amnt, .cat_' + i + '_mar_amnt, .cat_' + i +
                    '_apr_amnt, .cat_' + i + '_may_amnt, .cat_' + i + '_jun_amnt, .cat_' + i +
                    '_jul_amnt, .cat_' + i + '_aug_amnt, .cat_' + i + '_sep_amnt, .cat_' + i +
                    '_oct_amnt, .cat_' + i + '_nov_amnt, .cat_' + i + '_dec_amnt').on('input', function () {
                    let total = 0;
                    // Sum up monthly values
                    for (let month = 1; month <= 12; month++) {
                        total += parseFloat($('.cat_' + i + '_' + getMonthAbbreviation(month) + '_amnt')
                            .val()) || 0;
                    }
                    // Set the total value
                    $('.cat_' + i + '_total_amnt').val(total.toFixed(2));
                    updateInvAmount();
                });
            }

            // Function to calculate the total sum for a specific class
            function calculateTotal(className) {
                let total = 0;
                $('.' + className).each(function () {
                    total += parseFloat($(this).val()) || 0;
                });
                return total;
            }
            
            function calculateTotal2(className) {
                let total = 0;
                $('.' + className).each(function () {
                    total += parseFloat($(this).val()) || 0;
                });
                return total.toFixed(2);
            }

            // Function to update sku_count when total_item changes
            function updateSkuCount() {
                $('.sku_count').val(calculateTotal('total_items'));
            }

            // Function to update inv_adjustment when total_amount changes
            function updateInvAmount() {
                $('.inv_adjustment').val(calculateTotal2('total_amount'));
            }

               // Attach event listener to all total_item inputs
                $('.form-control').on('input', updateSkuCount);

            // Attach event listener to all total_amount inputs
            $('.form-control').on('input', updateInvAmount);


        });

    </script>

    
<script>
    document.getElementById('dataEntryForm').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            var currentInput = document.activeElement;
            var inputs = document.getElementById('dataEntryForm').querySelectorAll('input');
            var currentIndex = Array.prototype.indexOf.call(inputs, currentInput);
            if (currentIndex < inputs.length - 1) {
                inputs[currentIndex + 1].focus();
            }
        }
    });

</script>

    @endsection
