
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
            <div class="col-12 text-center">
                <div class="">
                    <img class="me-2" src="{{ public_path('frontend/img/logo.png')}}" alt="" width="80px">
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
    </div>
</body>

</html>