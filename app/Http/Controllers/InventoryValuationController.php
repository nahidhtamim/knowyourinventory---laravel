<?php

namespace App\Http\Controllers;

use App\Models\InventoryValuation;
use App\Models\Page;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryValuationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Inventory Valuation Form Page ===== //
    public function inventory_valuation()
    {
        $pages = Page::where('status', '1')->get();
        return view('templates.inventory-valuation.index', compact('pages'));
    }
    
    // ===== Show 12 Months Forecast Form Data ===== //
    public function inventory_valuation_details($id)
    {
        $pages = Page::where('status', '1')->get();
        $valuationData = InventoryValuation::find($id);
        return view('templates.inventory-valuation.details', compact('pages', 'valuationData'));
    }

    // ===== Export 12 Months Forecast Form Data ===== //
    public function view_pdf_inventory_valuation($id)
    {
        $valuationData = InventoryValuation::find($id);
        $pdf = PDF::loadView('templates.inventory-valuation.pdf',compact('valuationData'))->setPaper('a4', 'portrait');
        // return $pdf->download('inventory.valuation.pdf');
        return $pdf->stream();
    }
    
    // ===== Save 12 Months Forecast Form Data ===== //
    public function save_inventory_valuation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'row_count' => 'required|integer|min:1',
            'total_inventory' => 'required|numeric|min:0',
        ]);

        // Create a new InventoryValuation instance
        $inventoryValuation = new InventoryValuation();
        $inventoryValuation->title = $request->title;
        $inventoryValuation->user_id = auth()->id(); // If you have user authentication

        // Save category data with incremental keys
        $categoryData = [];
        $inventoryValuationData = [];
        for ($i = 1; $i <= $request->row_count; $i++) {
            $categoryData['category_' . $i] = $request->input('category_' . $i);
            $inventoryValuationData['inventory_valuation_' . $i] = $request->input('inventory_valuation_' . $i);
        }
        $inventoryValuation->categoy_data = json_encode($categoryData);
        $inventoryValuation->inventory_data = json_encode($inventoryValuationData);
        $inventoryValuation->total_inventory = $request->total_inventory;
        $inventoryValuation->save();

        // Redirect to the edit page of the newly saved item
        return redirect()->route('edit.inventory.valuation', $inventoryValuation->id)->with('success', 'Inventory valuation saved successfully.');
    }

    // ===== Edit 12 Months Forecast Form Data ===== //
    public function edit_inventory_valuation($id)
    {
        $pages = Page::where('status', '1')->get();
        $valuationData = InventoryValuation::find($id);
        return view('templates.inventory-valuation.edit', compact('pages', 'valuationData'));
    }

    // ===== Save 12 Months Forecast Form Data ===== //
    public function update_inventory_valuation(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'row_count' => 'required|integer|min:1',
            'total_inventory' => 'required|numeric|min:0',
        ]);
    
        // Retrieve the existing InventoryValuation instance
        $inventoryValuation = InventoryValuation::findOrFail($id);
        
        // Update the InventoryValuation attributes
        $inventoryValuation->title = $request->title;
    
        // Save category data with incremental keys
        $categoryData = [];
        $inventoryValuationData = [];
        for ($i = 1; $i <= $request->row_count; $i++) {
            $categoryData['category_' . $i] = $request->input('category_' . $i);
            $inventoryValuationData['inventory_valuation_' . $i] = $request->input('inventory_valuation_' . $i);
        }
        $inventoryValuation->categoy_data = json_encode($categoryData);
        $inventoryValuation->inventory_data = json_encode($inventoryValuationData);
        $inventoryValuation->total_inventory = $request->total_inventory;
    
        // Save the changes
        $inventoryValuation->update();
    
        // Redirect to the edit page of the updated item
        return redirect()->back()->with('success', 'Inventory valuation updated successfully.');
    }
    
}
