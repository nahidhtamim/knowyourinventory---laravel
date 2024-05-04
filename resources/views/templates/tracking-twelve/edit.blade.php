@extends('layouts.avatar')
@section('title')
Edit {{$forecastData->title}} - 12 Month Forecast | Know Your Inventory
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
<style>
    td,
    input{
        min-width: 120px;
        font-size: 13px
    }
</style>
<div class="container">

    <div class="row print-card mb-5">
        <div class="col-12 text-center">
            <div class="">
                <h1 class="display-3">12 Month Forecast</h1>
            </div>
        </div>
        <form action="{{ route('update.tracking.twelve', ['id' => $forecastData->id] )}}" method="POST" id="dataEntryForm">
            @csrf
        <div class="col-12 text-center">
            <div class="py-5">
                <label for="title">Department/Category</label>
                <input type="text" class="form-control" name="title" value="{{$forecastData->title}}" required>
            </div>
        </div>
        <div class="col-lg-12">
            <h4 class="py-3">Department/Category: {{$forecastData->title}}</h4>
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-striped monthly-forcast">
                    <thead>
                        <tr>
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
                                <td><input type="text" class="form-control {{$month}}_estimator" name="{{$month}}_estimator" value="{{ $walkInPerDayData[$month] ?? '' }}"></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td># Business Days</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_business_days" name="{{$month}}_business_days" value="{{ $businessDaysData[$month] ?? '' }}"></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Walk-In</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_walk_in" name="{{$month}}_walk_in" value="{{ $walkInData[$month] ?? '' }}" readonly></td>
                            @endforeach
                        </tr>
                        
                        {{-- <tr>
                            <td>Web Purchase</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_web_purchase" name="{{$month}}_web_purchase" value="{{ $webPurchaseData[$month] ?? '' }}"></td>
                            @endforeach
                        </tr> --}}

                        <tr>
                            <td>Total</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_first_total" name="{{$month}}_first_total" value="{{ $totalOneData[$month] ?? '' }}" readonly></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Estimated Purchase %</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_estimated_purchase" name="{{$month}}_estimated_purchase" value="{{ $estimatedPurchaseData[$month] ?? '' }}"></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Total</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_second_total" name="{{$month}}_second_total" value="{{ $totalTwoData[$month] ?? '' }}" readonly></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>$ Per Invoice</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_per_invoice" name="{{$month}}_per_invoice" value="{{ $perInvoiceData[$month] ?? '' }}"></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Monthly Total Sales</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_monthly_sales" name="{{$month}}_monthly_sales" value="{{ $monthlyTotalData[$month] ?? '' }}" readonly></td>
                            @endforeach
                        </tr>
                        
                        <tr>
                            <td>$ Per Days</td>
                            
                            @foreach($months as $month)
                                <td><input type="text" class="form-control {{$month}}_per_days" name="{{$month}}_per_days" value="{{ $perDayData[$month] ?? '' }}" readonly></td>
                            @endforeach
                        </tr>

                        <tr>
                            <td class="bg-dark" colspan="13"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="text-center my-5">
            <button class="btn btn-primary px-5" type="submit">Save</button>
            <a href="{{ route('tracking.twelve.details', ['id' => $forecastData->id] )}}"
                class="btn btn-secondary px-5">View</a>
        </div>

    </form>
    </div>
    
</div>


<script>
    const months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

    // Function to calculate walk-ins
    function calculateWalkIn(month) {
        const estimator = parseFloat(document.querySelector(`.form-control.${month}_estimator`).value) || 0;
        const businessDays = parseFloat(document.querySelector(`.form-control.${month}_business_days`).value) || 0;
        const walkIn = Math.floor(estimator * businessDays);
        document.querySelector(`.form-control.${month}_walk_in`).value = walkIn;
        calculateTotal(month);
    }

    // function calculateWalkIn(month) {
    //     const estimator = parseFloat(document.querySelector(`.form-control.${month}_estimator`).value) || 0;
    //     const businessDays = parseFloat(document.querySelector(`.form-control.${month}_business_days`).value) || 0;
    //     const walkIn = Math.floor(estimator * businessDays);
    //     document.querySelector(`.form-control.${month}_walk_in`).value = walkIn;
    //     calculateTotal(month);
    // }

    function calculateTotal(month) {
        const walkIn = parseFloat(document.querySelector(`.form-control.${month}_walk_in`).value) || 0;
        const total = walkIn.toFixed(2);
        document.querySelector(`.form-control.${month}_first_total`).value = total;
        calculateSecondTotal(month);
    }

    // function calculateTotal(month) {
    //     const walkIn = parseFloat(document.querySelector(`.form-control.${month}_walk_in`).value) || 0;
    //     const webPurchase = parseFloat(document.querySelector(`.form-control.${month}_web_purchase`).value) || 0;
    //     const total = walkIn + webPurchase;
    //     document.querySelector(`.form-control.${month}_first_total`).value = total;
    //     calculateSecondTotal(month);
    // }


    const estimatedPurchaseInputs = document.querySelectorAll('.estimated_purchase');

    // Iterate over each input element
    estimatedPurchaseInputs.forEach(input => {
        // Add event listener for input change
        input.addEventListener('input', function() {
            // Add '%' symbol to the input value
            if (this.value.trim() !== '' && !this.value.endsWith('%')) {
                this.value += '%';
            }
        });
    });

    function calculateSecondTotal(month) {
        const firstTotal = parseFloat(document.querySelector(`.form-control.${month}_first_total`).value) || 0;
        const estimatedPurchase = parseFloat(document.querySelector(`.form-control.${month}_estimated_purchase`).value) || 0;
        const secondTotal = firstTotal * (estimatedPurchase / 100);
        document.querySelector(`.form-control.${month}_second_total`).value = secondTotal.toFixed(2);;
        calculateMonthlySales(month);
    }

    function calculateMonthlySales(month) {
        const secondTotal = parseFloat(document.querySelector(`.form-control.${month}_second_total`).value) || 0;
        const perInvoice = parseFloat(document.querySelector(`.form-control.${month}_per_invoice`).value) || 0;
        const monthlySales = secondTotal * perInvoice;
        document.querySelector(`.form-control.${month}_monthly_sales`).value = monthlySales.toFixed(2);
    }

    function calculatePerDays(month) {
        const monthlySales = parseFloat(document.querySelector(`.form-control.${month}_monthly_sales`).value) || 0;
        const businessDays = parseFloat(document.querySelector(`.form-control.${month}_business_days`).value) || 0;
        // Avoid division by zero
        const perDays = businessDays !== 0 ? monthlySales / businessDays : 0;
        document.querySelector(`.form-control.${month}_per_days`).value = perDays.toFixed(2);
    }

    // Add event listener for all form control input fields
    document.querySelectorAll('.form-control').forEach(input => {
        input.addEventListener('input', function() {
            // Get the month abbreviation from the input field's class
            let month = this.classList[1].split('_')[0];

            // Call your update functions with the current month
            //calculateWalkIns(month);
            calculateWalkIn(month);
            calculateTotal(month);
            calculateSecondTotal(month);
            calculateMonthlySales(month);
            calculatePerDays(month);
        });
    });
    
    // months.forEach(month => {
    //     document.querySelector(`.form-control.${month}_estimator`).addEventListener('input', () => calculateWalkIn(month));
    //     document.querySelector(`.form-control.${month}_business_days`).addEventListener('input', () => calculateWalkIn(month));
    //     document.querySelector(`.form-control.${month}_walk_in`).addEventListener('input', () => calculateTotal(month));
    //     document.querySelector(`.form-control.${month}_web_purchase`).addEventListener('input', () => calculateTotal(month));
    //     document.querySelector(`.form-control.${month}_first_total`).addEventListener('input', () => calculateSecondTotal(month));
    //     document.querySelector(`.form-control.${month}_estimated_purchase`).addEventListener('input', () => calculateSecondTotal(month));
    //     document.querySelector(`.form-control.${month}_second_total`).addEventListener('input', () => calculateMonthlySales(month));
    //     document.querySelector(`.form-control.${month}_per_invoice`).addEventListener('input', () => calculateMonthlySales(month));
    //     document.querySelector(`.form-control.${month}_business_days`).addEventListener('input', () => calculatePerDays(month));
    // });
</script>
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


@endsection
