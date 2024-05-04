@extends('layouts.avatar')
@section('title')
Edit {{$valuationData->title}} - Inventory Valuation | Know Your Inventory
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
    <div class="row">
        <form action="{{ route('update.inventory.valuation', ['id' => $valuationData->id] )}}" method="POST" id="dataEntryForm">
            @csrf
            <div class="col-12 text-center">
                <div class="">
                    <h1 class="display-3">Inventory Valution</h1>
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="py-5">
                    <label for="title">Department/Category</label>
                    <input type="text" class="form-control" name="title" placeholder="Department/Category" value="{{$valuationData->title}}" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Number of Rows</span>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="row_count_input" name="row_count" placeholder="Enter Number of Inventory" value="{{$maxRows}}" required>
                            <label for="row_count_input">Number of Rows</label>
                        </div>
                    </div>
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
                            <tr>
                                <td class="text-center"><?php echo $i; ?></td>
                                <td><input type="text" class="form-control category" name="category_<?php echo $i; ?>" value="<?php echo isset($categoryData['category_' . $i]) ? $categoryData['category_' . $i] : ''; ?>"></td>
                                <td><input type="number" class="form-control inventory_valuation" step="0.01" name="inventory_valuation_<?php echo $i; ?>" value="<?php echo isset($inventoryData['inventory_valuation_' . $i]) ? $inventoryData['inventory_valuation_' . $i] : ''; ?>"></td>
                            </tr>
                            <?php endfor; ?>
                        </tbody>
                        
                        <tfoot>
                            <tr>
                                <td class="text-center"><p>Number of Rows: <span class="row_count_output"><?php echo $maxRows; ?></span></p></td>
                                <td class="text-center">TOTAL</td>
                                <td><input type="text" class="form-control total_inventory" name="total_inventory" value="{{$valuationData->total_inventory}}" readonly></td>
                            </tr>
                        </tfoot>
                    </table>
                    
                    
                </div>
                <div class="text-center my-5">
                    <button class="btn btn-primary px-5" type="submit">Save</button>
                    <a href="{{ route('inventory.valuation.details', ['id' => $valuationData->id] )}}"
                        class="btn btn-secondary px-5">View</a>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Add event listener for changing row count
        document.getElementById('row_count_input').addEventListener('input', function() {
            var rowCount = parseInt(this.value);
            var tbody = document.querySelector('#inventory_table tbody');
            var rowOutput = document.querySelector('.row_count_output');
            var lastCount = parseInt(rowOutput.textContent);
            
            if (rowCount < lastCount) {
                // Remove excess rows if the new row count is less than the current count
                while (tbody.children.length > rowCount) {
                    tbody.removeChild(tbody.lastChild);
                }
            } else {
                // Add rows after the default rows
                for (var i = lastCount + 1; i <= rowCount; i++) {
                    var tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td class="text-center">${i}</td>
                        <td><input type="text" class="form-control category" name="category_${i}"></td>
                        <td><input type="number" class="form-control inventory_valuation" step="0.01" name="inventory_valuation_${i}"></td>
                    `;
                    tbody.appendChild(tr);
                    
                    // Add event listener to dynamically added input field
                    tr.querySelector('.inventory_valuation').addEventListener('input', updateTotalInventory);
                }
            }
            
            // Update row count output
            rowOutput.textContent = rowCount;
            
            // Update total inventory valuation when rows are added or removed
            
        });
        
        // Function to update total inventory valuation
        function updateTotalInventory() {
            var inventoryValuationInputs = document.querySelectorAll('.inventory_valuation');
            var totalInventoryInput = document.querySelector('.total_inventory');
            
            var total = 0;
            inventoryValuationInputs.forEach(function(input) {
                var value = parseFloat(input.value) || 0;
                total += value;
            });
            totalInventoryInput.value = total.toFixed(2); // Display total with 2 decimal places
        }

        // Bind the updateGoals function to input events
        $(".form-control").on("input", function () {
            updateTotalInventory();
        });
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
