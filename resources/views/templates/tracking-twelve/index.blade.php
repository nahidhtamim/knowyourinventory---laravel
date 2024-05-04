@extends('layouts.avatar')
@section('title')
12 Month Forecast | Know Your Inventory
@endsection
@section('avatar_content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<style>
    td,
    input{
        min-width: 120px;
        font-size: 13px
    }
</style>

<div class="container">
    <div class="row">
        <form action="{{route('save.tracking.twelve')}}" method="POST" id="">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <h1 class="display-3">12 Month Forecast</h1>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="py-5">
                    <label for="title">Department/Category</label>
                    <input type="text" class="form-control" name="title" placeholder="Department/Category" required>
                </div>
            </div>
            <div class="col-lg-12">
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
                            {{-- <tr>
                                <td>Customer Traffic</td>
                                <td class="bg-dark" colspan="12"></td>
                            </tr> --}}
                            <tr>
                                <td>Walk-In Per Day Estimator</td>
                                <td><input type="text" class="form-control jan_estimator" name="jan_estimator"></td>
                                <td><input type="text" class="form-control feb_estimator" name="feb_estimator"></td>
                                <td><input type="text" class="form-control mar_estimator" name="mar_estimator"></td>
                                <td><input type="text" class="form-control apr_estimator" name="apr_estimator"></td>
                                <td><input type="text" class="form-control may_estimator" name="may_estimator"></td>
                                <td><input type="text" class="form-control jun_estimator" name="jun_estimator"></td>
                                <td><input type="text" class="form-control jul_estimator" name="jul_estimator"></td>
                                <td><input type="text" class="form-control aug_estimator" name="aug_estimator"></td>
                                <td><input type="text" class="form-control sep_estimator" name="sep_estimator"></td>
                                <td><input type="text" class="form-control oct_estimator" name="oct_estimator"></td>
                                <td><input type="text" class="form-control nov_estimator" name="nov_estimator"></td>
                                <td><input type="text" class="form-control dec_estimator" name="dec_estimator"></td>
                            </tr>
                            <tr>
                                <td># Business Days</td>
                                <td><input type="text" class="form-control jan_business_days" name="jan_business_days"></td>
                                <td><input type="text" class="form-control feb_business_days" name="feb_business_days"></td>
                                <td><input type="text" class="form-control mar_business_days" name="mar_business_days"></td>
                                <td><input type="text" class="form-control apr_business_days" name="apr_business_days"></td>
                                <td><input type="text" class="form-control may_business_days" name="may_business_days"></td>
                                <td><input type="text" class="form-control jun_business_days" name="jun_business_days"></td>
                                <td><input type="text" class="form-control jul_business_days" name="jul_business_days"></td>
                                <td><input type="text" class="form-control aug_business_days" name="aug_business_days"></td>
                                <td><input type="text" class="form-control sep_business_days" name="sep_business_days"></td>
                                <td><input type="text" class="form-control oct_business_days" name="oct_business_days"></td>
                                <td><input type="text" class="form-control nov_business_days" name="nov_business_days"></td>
                                <td><input type="text" class="form-control dec_business_days" name="dec_business_days"></td>
                            </tr>
                            
                            <tr>
                                <td>Walk-In</td>
                                <td><input type="text" class="form-control jan_walk_in" name="jan_walk_in" readonly></td>
                                <td><input type="text" class="form-control feb_walk_in" name="feb_walk_in" readonly></td>
                                <td><input type="text" class="form-control mar_walk_in" name="mar_walk_in" readonly></td>
                                <td><input type="text" class="form-control apr_walk_in" name="apr_walk_in" readonly></td>
                                <td><input type="text" class="form-control may_walk_in" name="may_walk_in" readonly></td>
                                <td><input type="text" class="form-control jun_walk_in" name="jun_walk_in" readonly></td>
                                <td><input type="text" class="form-control jul_walk_in" name="jul_walk_in" readonly></td>
                                <td><input type="text" class="form-control aug_walk_in" name="aug_walk_in" readonly></td>
                                <td><input type="text" class="form-control sep_walk_in" name="sep_walk_in" readonly></td>
                                <td><input type="text" class="form-control oct_walk_in" name="oct_walk_in" readonly></td>
                                <td><input type="text" class="form-control nov_walk_in" name="nov_walk_in" readonly></td>
                                <td><input type="text" class="form-control dec_walk_in" name="dec_walk_in" readonly></td>
                            </tr>
                            
                            {{-- <tr>
                                <td>Web Purchase</td>
                                <td><input type="text" class="form-control jan_web_purchase" name="jan_web_purchase"></td>
                                <td><input type="text" class="form-control feb_web_purchase" name="feb_web_purchase"></td>
                                <td><input type="text" class="form-control mar_web_purchase" name="mar_web_purchase"></td>
                                <td><input type="text" class="form-control apr_web_purchase" name="apr_web_purchase"></td>
                                <td><input type="text" class="form-control may_web_purchase" name="may_web_purchase"></td>
                                <td><input type="text" class="form-control jun_web_purchase" name="jun_web_purchase"></td>
                                <td><input type="text" class="form-control jul_web_purchase" name="jul_web_purchase"></td>
                                <td><input type="text" class="form-control aug_web_purchase" name="aug_web_purchase"></td>
                                <td><input type="text" class="form-control sep_web_purchase" name="sep_web_purchase"></td>
                                <td><input type="text" class="form-control oct_web_purchase" name="oct_web_purchase"></td>
                                <td><input type="text" class="form-control nov_web_purchase" name="nov_web_purchase"></td>
                                <td><input type="text" class="form-control dec_web_purchase" name="dec_web_purchase"></td>
                            </tr> --}}
                            <tr>
                                <td>Total</td>
                                <td><input type="text" class="form-control jan_first_total" name="jan_first_total" readonly></td>
                                <td><input type="text" class="form-control feb_first_total" name="feb_first_total" readonly></td>
                                <td><input type="text" class="form-control mar_first_total" name="mar_first_total" readonly></td>
                                <td><input type="text" class="form-control apr_first_total" name="apr_first_total" readonly></td>
                                <td><input type="text" class="form-control may_first_total" name="may_first_total" readonly></td>
                                <td><input type="text" class="form-control jun_first_total" name="jun_first_total" readonly></td>
                                <td><input type="text" class="form-control jul_first_total" name="jul_first_total" readonly></td>
                                <td><input type="text" class="form-control aug_first_total" name="aug_first_total" readonly></td>
                                <td><input type="text" class="form-control sep_first_total" name="sep_first_total" readonly></td>
                                <td><input type="text" class="form-control oct_first_total" name="oct_first_total" readonly></td>
                                <td><input type="text" class="form-control nov_first_total" name="nov_first_total" readonly></td>
                                <td><input type="text" class="form-control dec_first_total" name="dec_first_total" readonly></td>
                            </tr>
                            <tr>
                                <td>Estimated Purchase %</td>
                                <td><input type="text" class="form-control jan_estimated_purchase" name="jan_estimated_purchase"></td>
                                <td><input type="text" class="form-control feb_estimated_purchase" name="feb_estimated_purchase"></td>
                                <td><input type="text" class="form-control mar_estimated_purchase" name="mar_estimated_purchase"></td>
                                <td><input type="text" class="form-control apr_estimated_purchase" name="apr_estimated_purchase"></td>
                                <td><input type="text" class="form-control may_estimated_purchase" name="may_estimated_purchase"></td>
                                <td><input type="text" class="form-control jun_estimated_purchase" name="jun_estimated_purchase"></td>
                                <td><input type="text" class="form-control jul_estimated_purchase" name="jul_estimated_purchase"></td>
                                <td><input type="text" class="form-control aug_estimated_purchase" name="aug_estimated_purchase"></td>
                                <td><input type="text" class="form-control sep_estimated_purchase" name="sep_estimated_purchase"></td>
                                <td><input type="text" class="form-control oct_estimated_purchase" name="oct_estimated_purchase"></td>
                                <td><input type="text" class="form-control nov_estimated_purchase" name="nov_estimated_purchase"></td>
                                <td><input type="text" class="form-control dec_estimated_purchase" name="dec_estimated_purchase"></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><input type="text" class="form-control jan_second_total" name="jan_second_total" readonly></td>
                                <td><input type="text" class="form-control feb_second_total" name="feb_second_total" readonly></td>
                                <td><input type="text" class="form-control mar_second_total" name="mar_second_total" readonly></td>
                                <td><input type="text" class="form-control apr_second_total" name="apr_second_total" readonly></td>
                                <td><input type="text" class="form-control may_second_total" name="may_second_total" readonly></td>
                                <td><input type="text" class="form-control jun_second_total" name="jun_second_total" readonly></td>
                                <td><input type="text" class="form-control jul_second_total" name="jul_second_total" readonly></td>
                                <td><input type="text" class="form-control aug_second_total" name="aug_second_total" readonly></td>
                                <td><input type="text" class="form-control sep_second_total" name="sep_second_total" readonly></td>
                                <td><input type="text" class="form-control oct_second_total" name="oct_second_total" readonly></td>
                                <td><input type="text" class="form-control nov_second_total" name="nov_second_total" readonly></td>
                                <td><input type="text" class="form-control dec_second_total" name="dec_second_total" readonly></td>
                            </tr>
                            <tr>
                                <td>$ Per Invoice</td>
                                <td><input type="text" class="form-control jan_per_invoice" name="jan_per_invoice"></td>
                                <td><input type="text" class="form-control feb_per_invoice" name="feb_per_invoice"></td>
                                <td><input type="text" class="form-control mar_per_invoice" name="mar_per_invoice"></td>
                                <td><input type="text" class="form-control apr_per_invoice" name="apr_per_invoice"></td>
                                <td><input type="text" class="form-control may_per_invoice" name="may_per_invoice"></td>
                                <td><input type="text" class="form-control jun_per_invoice" name="jun_per_invoice"></td>
                                <td><input type="text" class="form-control jul_per_invoice" name="jul_per_invoice"></td>
                                <td><input type="text" class="form-control aug_per_invoice" name="aug_per_invoice"></td>
                                <td><input type="text" class="form-control sep_per_invoice" name="sep_per_invoice"></td>
                                <td><input type="text" class="form-control oct_per_invoice" name="oct_per_invoice"></td>
                                <td><input type="text" class="form-control nov_per_invoice" name="nov_per_invoice"></td>
                                <td><input type="text" class="form-control dec_per_invoice" name="dec_per_invoice"></td>
                            </tr>
                            <tr>
                                <td>Monthly Total Sales</td>
                                <td><input type="text" class="form-control jan_monthly_sales" name="jan_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control feb_monthly_sales" name="feb_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control mar_monthly_sales" name="mar_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control apr_monthly_sales" name="apr_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control may_monthly_sales" name="may_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control jun_monthly_sales" name="jun_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control jul_monthly_sales" name="jul_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control aug_monthly_sales" name="aug_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control sep_monthly_sales" name="sep_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control oct_monthly_sales" name="oct_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control nov_monthly_sales" name="nov_monthly_sales" readonly></td>
                                <td><input type="text" class="form-control dec_monthly_sales" name="dec_monthly_sales" readonly></td>
                            </tr>
                            
                            <tr>
                                <td>$ Per Day</td>
                                <td><input type="text" class="form-control jan_per_days" name="jan_per_days" readonly></td>
                                <td><input type="text" class="form-control feb_per_days" name="feb_per_days" readonly></td>
                                <td><input type="text" class="form-control mar_per_days" name="mar_per_days" readonly></td>
                                <td><input type="text" class="form-control apr_per_days" name="apr_per_days" readonly></td>
                                <td><input type="text" class="form-control may_per_days" name="may_per_days" readonly></td>
                                <td><input type="text" class="form-control jun_per_days" name="jun_per_days" readonly></td>
                                <td><input type="text" class="form-control jul_per_days" name="jul_per_days" readonly></td>
                                <td><input type="text" class="form-control aug_per_days" name="aug_per_days" readonly></td>
                                <td><input type="text" class="form-control sep_per_days" name="sep_per_days" readonly></td>
                                <td><input type="text" class="form-control oct_per_days" name="oct_per_days" readonly></td>
                                <td><input type="text" class="form-control nov_per_days" name="nov_per_days" readonly></td>
                                <td><input type="text" class="form-control dec_per_days" name="dec_per_days" readonly></td>
                            </tr>
                            <tr>
                                <td class="bg-dark" colspan="13"></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <div class="text-center my-5">
                    <button class="btn btn-primary px-5" type="submit">Save</button>
                </div>
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
