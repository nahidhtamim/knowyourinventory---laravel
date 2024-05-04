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

<div class="container">
    <div class="row print-card mb-5">
        <div class="col-12 text-center">
            <div class="">
                <img class="me-2" src="{{ public_path('frontend/img/logo.png')}}" alt="" width="80px">
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
</div>



</body>

</html>