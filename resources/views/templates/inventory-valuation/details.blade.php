@extends('layouts.avatar')
@section('title')
{{$valuationData->title}} - Inventory Valuation | Know Your Inventory
@endsection
@section('avatar_content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

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
        <form action="{{ route('view.pdf.inventory.valuation', ['id' => $valuationData->id] )}}" method="post" target="__blank">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <img class="me-2" src="{{ asset('frontend/img/logo.png')}}" alt="" width="80px">
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
    <div class="text-center">
        <div class="btn-group text-center my-5">
            <button class="btn btn-primary px-3" type="submit">Download PDF</button> <button class="btn btn-secondary px-5" type="button" onclick="printCard()">Print PDF</button>
        </div>
    </div>
    
</form>
</div>


@endsection

