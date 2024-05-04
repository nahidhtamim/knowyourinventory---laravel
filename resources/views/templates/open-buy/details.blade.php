@extends('layouts.avatar')
@section('title')
{{$openBuyData->title}} - Open To Buy | Know Your Inventory
@endsection
@section('avatar_content')

<style>
    td {
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
        <form action="{{ route('view.pdf.open.buy', ['id' => $openBuyData->id] )}}" method="post" target="__blank">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <img class="me-2" src="{{ asset('frontend/img/logo.png')}}" alt="" width="80px">
                    <h3 class="display-3"> KYI - Open To Buy</h3>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <h4 class="py-2">Department/Category: {{$openBuyData->title}}</h4>
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
                            <tr class="text-center">
                                <td>Inventory Target</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($invTar[$month]))${{ $invTar[$month] }}@endif</td>
                                @endforeach
                            </tr>
        
                            <tr class="text-center">
                                <td>Inventory Valuation</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($invVal[$month]))${{ $invVal[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Retail Sales</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($retSale[$month]))${{ $retSale[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>COGS</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($cogs[$month]))${{ $cogs[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Margin</td>
        
                                @foreach($months as $month)
                                <td>{{ $margin[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>LY Sales</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($lySalesInvoice[$month]))${{ $lySalesInvoice[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>% Sales Change</td>
        
                                @foreach($months as $month)
                                <td>{{ $salesChangeTotal[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
        
                            <tr class="text-center">
                                <td>Planned Sales</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($plannedSales[$month]))${{ $plannedSales[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Inventory on Order</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($inventoryOnOrder[$month]))${{ $inventoryOnOrder[$month] }}@endif</td>
                                @endforeach
                            </tr>
        
                            <tr class="text-center">
                                <td>Inventory Purchased</td>
        
                                @foreach($months as $month)
                                <td>@if(isset($inventoryPurchased[$month]))${{ $inventoryPurchased[$month] }}@endif</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Inventory Quantity on Hand</td>
        
                                @foreach($months as $month)
                                <td>{{ $inventoryOnHand[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Inventory Quantity Sold</td>
        
                                @foreach($months as $month)
                                <td>{{ $inventorySold[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
        
                            <tr class="text-center">
                                <td>Inventory Turnover</td>
        
                                @foreach($months as $month)
                                <td>{{ $inventoryTurnover[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Days Supply</td>
        
                                @foreach($months as $month)
                                <td>{{ $daysSupply[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Sell Through</td>
        
                                @foreach($months as $month)
                                <td>{{ $sellThrough[$month] ?? '' }}</td>
                                @endforeach
                            </tr>
                            <tr class="text-center">
                                <td>Stock to Sales</td>
        
                                @foreach($months as $month)
                                <td>{{ $stockSales[$month] ?? '' }}</td>
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
                var nextMonthSalesOutput = parseFloat($('.form-control.' + nextMonth + '_sales_output').val()
                    .replace(/\$|,/g, '')) || 0;
                sumSalesOutput += nextMonthSalesOutput;
            }
            $('.form-control.' + currentMonth + '_ending_inv_output').val(formatCurrency(sumSalesOutput));
        }

        function calculateOTB(currentMonth) {
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(
                /\$|,/g, '')) || 0;
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val()
                .replace(/\$|,/g, '')) || 0;
            var beginInvOutput = parseFloat($('.form-control.' + currentMonth + '_begin_inv_output').val()
                .replace(/\$|,/g, '')) || 0;

            var oTB = (salesOutput + endingInvOutput) - beginInvOutput;

            $('.form-control.' + currentMonth + '_otb').val(formatCurrency(oTB));
        }

        var monthSeven = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep'];

        for (var i = 0; i < monthSeven.length; i++) {
            calculateTurnsOutput(monthSeven[i]);
        }

        // Function to calculate turns_output for a given month
        function calculateTurnsOutput(currentMonth) {
            var endingInvOutput = parseFloat($('.form-control.' + currentMonth + '_ending_inv_output').val()
                .replace(/\$|,/g, '')) || 0;
            var salesOutput = parseFloat($('.form-control.' + currentMonth + '_sales_output').val().replace(
                /\$|,/g, '')) || 0;
            var turnsOutput = salesOutput !== 0 ? endingInvOutput / salesOutput : 0;
            $('.form-control.' + currentMonth + '_turns_output').val(turnsOutput.toFixed(2));
        }

        // Function to format a number as currency (with a dollar sign)
        function formatCurrency(number) {
            return '$' + number.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    });

</script>

@endsection
