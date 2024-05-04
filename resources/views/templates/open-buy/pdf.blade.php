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
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 14px;
        }

    </style>

</head>

<body>
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
        <div class="col-12 text-center">
            <div class="">
                <img class="me-2" src="{{ public_path('frontend/img/logo.png')}}" alt="" width="80px">
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

</div>



</body>

</html>