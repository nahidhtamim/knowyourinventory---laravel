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
$categoryJson = $valuationData->categoy_data ?? '{}'; // Default to empty JSON object if data is null
$inventoryJson = $valuationData->inventory_data ?? '{}'; // Default to empty JSON object if data is null

$categoryData = json_decode($categoryJson, true);
$inventoryData = json_decode($inventoryJson, true);

// Determine the maximum number of rows based on the larger count of categories or inventory valuations
$maxRows = max(count($categoryData), count($inventoryData));

@endphp

<div class="container">
    <div class="row print-card mb-5">
        <div class="col-12 text-center">
            <div class="">
                <img class="me-2" src="{{ public_path('frontend/img/logo.png')}}" alt="" width="80px">
                <h3 class="display-3"> KYI - Inventory Valuation</h3>
                <hr>
            </div>
        </div>
        <div class="col-lg-12">
            <h4 class="py-2">Department/Category: {{$valuationData->title}}</h4>
            <div class="table-responsive">
                {{-- <input type="number" class="form-control" id="row_count_input" name="row_count" placeholder="Enter Number of Inventory" value="39" required> --}}
                <table id="inventory_table" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Count</th>
                            <th>Category</th>
                            <th>Inventory Valuation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                    
                        for ($i = 1; $i <= $maxRows; $i++):
                        ?>
                        <tr class="text-center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo isset($categoryData['category_' . $i]) ? $categoryData['category_' . $i] : ''; ?></td>
                            <td style="text-align: right"><?php echo isset($inventoryData['inventory_valuation_' . $i]) ? $inventoryData['inventory_valuation_' . $i] : ''; ?></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td class="text-center"><p>Number of Rows: <span class="row_count_output"><?php echo $maxRows; ?></span></p></td>
                            <td class="text-center">TOTAL</td>
                            <td style="text-align: right">{{$valuationData->total_inventory}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>



</body>

</html>