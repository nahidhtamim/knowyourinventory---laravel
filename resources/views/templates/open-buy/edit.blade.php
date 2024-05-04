@extends('layouts.avatar')
@section('title')
Edit {{$openBuyData->title}} - Open To Buy | Know Your Inventory
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

</style>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@php

$months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

$invTar = json_decode($openBuyData->inv_tar, true);
$invVal = json_decode($openBuyData->inv_val, true);
$retSale = json_decode($openBuyData->ret_sale, true);
$cogs = json_decode($openBuyData->cogs, true);
$margin = json_decode($openBuyData->margin, true);
$lySalesInvoice = json_decode($openBuyData->ly_sales, true);
$salesChangeTotal = json_decode($openBuyData->sales_change, true);
$plannedSales = json_decode($openBuyData->planned_sales, true);
$inventoryOnOrder = json_decode($openBuyData->inventory_on_order, true);
$inventoryPurchased = json_decode($openBuyData->inventory_purchased, true);
$inventoryOnHand = json_decode($openBuyData->inventory_on_hand, true);
$inventorySold = json_decode($openBuyData->inventory_sold, true);
$inventoryTurnover = json_decode($openBuyData->inventory_turnover, true);
$daysSupply = json_decode($openBuyData->days_supply, true);
$sellThrough = json_decode($openBuyData->sell_through, true);
$stockSales = json_decode($openBuyData->stock_sales, true);


$monthEleven = [ 'dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec_two'];
$salesOutput = json_decode($openBuyData->sales_output, true);
$endingInvOutput = json_decode($openBuyData->ending_inv_output, true);
$beginInvOutput = json_decode($openBuyData->begin_inv_output, true);
$otb = json_decode($openBuyData->otb, true);
$onOrderOutput = json_decode($openBuyData->on_order_output, true);
$netMtbOutput = json_decode($openBuyData->net_mtb_output, true);
$turnsOutput = json_decode($openBuyData->turns_output, true);

@endphp

<div class="container-fluid">
    <div class="row print-card mb-5">
        <form action="{{ route('update.open.buy', ['id' => $openBuyData->id] )}}" method="POST" id="">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <h1 class="display-3">Open To Buy</h1>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="py-5">
                    <label for="title">Department/Category</label>
                    <input type="text" class="form-control" name="title" value="{{$openBuyData->title}}" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-striped open-to-buy">
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
                                <td>Inventory Target</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inv_tar" name="{{$month}}_inv_tar" value="{{ $invTar[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
        
                            <tr>
                                <td>Inventory Valuation</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inv_val" name="{{$month}}_inv_val" value="{{ $invVal[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Retail Sales</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_ret_sale" name="{{$month}}_ret_sale" value="{{ $retSale[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>COGS</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_cogs" name="{{$month}}_cogs" value="{{ $cogs[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Margin</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_margin" name="{{$month}}_margin" value="{{ $margin[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>LY Sales</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_ly_sales" name="{{$month}}_ly_sales" value="{{ $lySalesInvoice[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>% Sales Change</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_sales_change" name="{{$month}}_sales_change" value="{{ $salesChangeTotal[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
        
                            <tr>
                                <td>Planned Sales</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_planned_sales" name="{{$month}}_planned_sales" value="{{ $plannedSales[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Inventory on Order</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inventory_on_order" name="{{$month}}_inventory_on_order" value="{{ $inventoryOnOrder[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
        
                            <tr>
                                <td>Inventory Purchased</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inventory_purchased" name="{{$month}}_inventory_purchased" value="{{ $inventoryPurchased[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Inventory Quantity on Hand</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inventory_on_hand" name="{{$month}}_inventory_on_hand" value="{{ $inventoryOnHand[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Inventory Quantity Sold</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inventory_sold" name="{{$month}}_inventory_sold" value="{{ $inventorySold[$month] ?? '' }}"></td>
                                @endforeach
                            </tr>
        
                            <tr>
                                <td>Inventory Turnover</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_inventory_turnover" name="{{$month}}_inventory_turnover" value="{{ $inventoryTurnover[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Days Supply</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_days_supply" name="{{$month}}_days_supply" value="{{ $daysSupply[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Sell Through</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_sell_through" name="{{$month}}_sell_through" value="{{ $sellThrough[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Stock to Sales</td>
        
                                @foreach($months as $month)
                                    <td><input type="text" class="form-control {{$month}}_stock_sales" name="{{$month}}_stock_sales" value="{{ $stockSales[$month] ?? '' }}" readonly></td>
                                @endforeach
                            </tr>
                        </tbody>
        
                    </table>
                </div>
            </div>
            {{-- <br>
            <div class="col-lg-12 pt-5 my-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Month</th>
                                <th>Sales Output</th>
                                <th>Ending Inventory Output</th>
                                <th>Begin Inventory Output</th>
                                <th>OTB</th>
                                <th>On Order Output</th>
                                <th>Net MTB Output</th>
                                <th>Turns Output</th>
                            </tr>
                        </thead>
                        @foreach ($monthEleven as $month)
                            <tr>
                                <td>{{ ucfirst($month) }}</td>

                                <td><input type="text" class="form-control {{$month}}_sales_output" name="{{$month}}_sales_output" value="{{ $salesOutput[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_ending_inv_output" name="{{$month}}_ending_inv_output" value="{{ $endingInvOutput[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_begin_inv_output" name="{{$month}}_begin_inv_output" value="{{ $beginInvOutput[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_otb" name="{{$month}}_otb" value="{{ $otb[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_on_order_output" name="{{$month}}_on_order_output" value="{{ $onOrderOutput[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_net_mtb_output" name="{{$month}}_net_mtb_output" value="{{ $netMtbOutput[$month] ?? '' }}" readonly></td>

                                <td><input type="text" class="form-control {{$month}}_turns_output" name="{{$month}}_turns_output" value="{{ $turnsOutput[$month] ?? '' }}" readonly></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div> --}}

            <div class="text-center my-5">
                <button class="btn btn-primary px-5" type="submit">Save</button>
                <a href="{{ route('open.buy.details', ['id' => $openBuyData->id] )}}"
                    class="btn btn-secondary px-5">View</a>
            </div>
        </form>
    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        // Array of month abbreviations
        const months = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];

        // Function to calculate and update Inventory Target
        function updateInventoryTarget(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let inventoryTarget = (retailSales * 1.1) * 3;
            let nextMonthIndex = (months.indexOf(month) + 1) % 12;
            let nextMonth = months[nextMonthIndex];
            $(`.${nextMonth}_inv_tar`).val(inventoryTarget.toFixed(2));
        }

        // Function to calculate and update Margin
        function updateMargin(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;
            let margin = (retailSales - cogs) / retailSales;
            $(`.${month}_margin`).val((margin * 100).toFixed(2) + '%');
        }

        // Function to calculate and update % Sales Change
        function updateSalesChange(month) {
            let retailSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let lySales = parseFloat($(`.${month}_ly_sales`).val()) || 0;
            let salesChange = (retailSales - lySales) / retailSales;
            $(`.${month}_sales_change`).val((salesChange * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Inventory Turnover
        function updateInventoryTurnover(month) {
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let inventoryTurnover = cogs / invVal;
            $(`.${month}_inventory_turnover`).val((inventoryTurnover * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Days Supply
        function updateDaysSupply(month) {
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let cogs = parseFloat($(`.${month}_cogs`).val()) || 0;

            let daysInMonth;
            switch (month) {
                case "jan":
                case "feb":
                case "mar":
                case "jun":
                case "jul":
                case "aug":
                case "sep":
                case "oct":
                case "dec":
                    daysInMonth = 31;
                    break;
                case "may":
                case "nov":
                    daysInMonth = 30;
                    break;
                case "apr":
                    daysInMonth = 28;
                    break;
                default:
                    daysInMonth = 0;
            }
            let daysSupply = (invVal / (cogs / daysInMonth));
            $(`.${month}_days_supply`).val(daysSupply.toFixed(2));
        }

        // Function to calculate and update Sell Through
        function updateSellThrough(month) {
            let invOnHand = parseFloat($(`.${month}_inventory_on_hand`).val()) || 0;
            let invSold = parseFloat($(`.${month}_inventory_sold`).val()) || 0;
            let sellThrough = (invSold / invOnHand) * 1;
            $(`.${month}_sell_through`).val((sellThrough * 100).toFixed(2) + '%');
        }

        // Function to calculate and update Stock to Sales
        function updateStockToSales(month) {
            let retSales = parseFloat($(`.${month}_ret_sale`).val()) || 0;
            let invVal = parseFloat($(`.${month}_inv_val`).val()) || 0;
            let stockToSales = invVal / retSales;
            $(`.${month}_stock_sales`).val(stockToSales.toFixed(2));
        }

        // Add event listener for Retail Sales input fields
        $(".form-control").on("input", function () {
            // Get the month abbreviation from the input field's class
            let month = $(this).attr("class").split(" ")[1].split("_")[0];

            // Update Inventory Target for the current month
            updateInventoryTarget(month);
            // Update Margin for the current month
            updateMargin(month);
            // Update % Sales Change for the current month
            updateSalesChange(month);
            // Update Inventory Turnover for the current month
            updateInventoryTurnover(month);
            // Update Days Supply for the current month
            updateDaysSupply(month);
            // Update Stock to Sales for the current month
            updateStockToSales(month);
            // Update Sell Through for the current month
            updateSellThrough(month);
        });
    });
</script>

<script>
    
        
    // Your JavaScript code
    $(".form-control").on("input", function () {
        // Set values for all months
        setSalesOutput('dec');
        setSalesOutput('jan');
        setSalesOutput('feb');
        setSalesOutput('mar');
        setSalesOutput('apr');
        setSalesOutput('may');
        setSalesOutput('jun');
        setSalesOutput('jul');
        setSalesOutput('aug');
        setSalesOutput('sep');
        setSalesOutput('oct');
        setSalesOutput('nov');

        // Set values for all months
        setInvOutput('dec');
        setInvOutput('jan');
        setInvOutput('feb');
        setInvOutput('mar');
        setInvOutput('apr');
        setInvOutput('may');
        setInvOutput('jun');
        setInvOutput('jul');
        setInvOutput('aug');
        setInvOutput('sep');
        setInvOutput('oct');
        setInvOutput('nov');

        
        function setSalesOutput(month) {
            var ret_sale_value = $('.form-control.' + month + '_ret_sale').val();
            var salesOutput = parseFloat(ret_sale_value) || 0;
            $('.form-control.' + month + '_sales_output').val(formatCurrency(salesOutput));
            calculateEndingInv(month);
            calculateOTB(month);
        }

        function setInvOutput(month) {
            var inv_val_value = $('.form-control.' + month + '_inv_val').val();
            var invOutput = parseFloat(inv_val_value) || 0;
            $('.form-control.' + month + '_begin_inv_output').val(formatCurrency(invOutput));
            calculateEndingInv(month);
            calculateOTB(month);
        }

        function calculateEndingInv(currentMonth) {
            var months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
            var currentIndex = months.indexOf(currentMonth);
            // Calculate the sum of sales_output for the next 3 months
            var sumSalesOutput = 0;
            for (var i = 1; i <= 3; i++) {
                var nextMonthIndex = (currentIndex + i) % 12;
                var nextMonth = months[nextMonthIndex];
                var nextMonthSalesOutput = parseFloat($('.form-control.' + nextMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
                sumSalesOutput += nextMonthSalesOutput;
            }
            $('.form-control.' + currentMonth + '_ending_inv_output').val(formatCurrency(sumSalesOutput));
        }

        function calculateOTB(currentMonth) {
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val().replace(/\$|,/g, '')) || 0;
            var beginInvOutput = parseFloat($('.form-control.' + currentMonth + '_begin_inv_output').val().replace(/\$|,/g, '')) || 0;

            var oTB = (salesOutput + endingInvOutput) - beginInvOutput;

            $('.form-control.' + currentMonth + '_otb').val(formatCurrency(oTB));
        }

        var monthSeven = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep'];

        for (var i = 0; i < monthSeven.length; i++) {
            calculateTurnsOutput(monthSeven[i]);
        }

        // Function to calculate turns_output for a given month
        function calculateTurnsOutput(currentMonth) {
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val().replace(/\$|,/g, '')) || 0;
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(/\$|,/g, '')) || 0;
            var turnsOutput = salesOutput !== 0 ? endingInvOutput / salesOutput : 0;
            $('.form-control.' + currentMonth + '_turns_output').val(turnsOutput.toFixed(2));
        }

        // Function to format a number as currency (with a dollar sign)
        function formatCurrency(number) {
            return '$' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    });
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
