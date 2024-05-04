<?php

namespace App\Http\Controllers;

use App\Models\CycleCount;
use App\Models\Page;
use App\Models\ThemeInfo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CycleCountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Open Cycle Count Form Page ===== //
    public function index()
    {
        $pages = Page::where('status', '1')->get();
        $color = ThemeInfo::Find('1');
        return view('templates.cycle-count.index', compact('pages', 'color'));
    }

    // ===== Show 12 Months Forecast Form Data ===== //
    public function cycle_count_details($id)
    {
        $pages = Page::where('status', '1')->get();
        $cycleData = CycleCount::find($id);
        // dd($cycleData->category_1_items);
        return view('templates.cycle-count.details', compact('pages', 'cycleData'));
    }

    public function view_pdf_cycle_count($id)
    {
        $cycleData = CycleCount::find($id);
        $pdf = PDF::loadView('templates.cycle-count.pdf',compact('cycleData'))->setPaper('a4', 'landscape');
        return $pdf->download('cycle-count.pdf');
    }

    public function save_cycle_count(Request $request)
    {
        // Initialize arrays to store category data
        $categoryItemsData = [];
        $categoryAmountData = [];
        $categoryTitle = [];

        // Loop through categories (assuming 28 categories)
        for ($i = 1; $i <= 28; $i++) {
            $categoryTitle[$i] = $this->getCategoryTitle($request, 'category_' . $i);
            $categoryItemsData[$i] = $this->getCategoryFormItem($request, 'cat_' . $i);
            $categoryAmountData[$i] = $this->getCategoryFormIAmnt($request, 'cat_' . $i);
        }


        // Create a new entry in the database using Eloquent
        $cycleCountData = [
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'inv_adjustment' => $request->inv_adjustment,
            'sku_count' => $request->sku_count,
        ];

        // Add category data to the cycle count data
        for ($i = 1; $i <= 28; $i++) {
            $cycleCountData['category_' . $i . '_title'] = $categoryTitle[$i];
            $cycleCountData['category_' . $i . '_items'] = json_encode($categoryItemsData[$i]);
            $cycleCountData['category_' . $i . '_amount'] = json_encode($categoryAmountData[$i]);
        }

        // Debugging: Dump and die the request data
        // dd($request->all());

        // Save the data to the database
        $ccd = CycleCount::create($cycleCountData);

        return redirect()->route('edit.cycle.count', $ccd->id)->with('status', 'Your data saved successfully');
    }

    // ===== Edit 12 Months Forecast Form Data ===== //
    public function edit_cycle_count($id)
    {
        $pages = Page::where('status', '1')->get();
        $cycleData = CycleCount::find($id);
        // dd($cycleData->category_1_items);
        return view('templates.cycle-count.edit', compact('pages', 'cycleData'));
    }

    public function update_cycle_count(Request $request, $id)
    {
        // Retrieve the existing record
        $cycleCount = CycleCount::findOrFail($id);

        // Initialize arrays to store category data
        $categoryItemsData = [];
        $categoryAmountData = [];
        $categoryTitle = [];

        // Loop through categories (assuming 28 categories)
        for ($i = 1; $i <= 28; $i++) {
            $categoryTitle[$i] = $this->getCategoryTitle($request, 'category_' . $i);
            $categoryItemsData[$i] = $this->getCategoryFormItem($request, 'cat_' . $i);
            $categoryAmountData[$i] = $this->getCategoryFormIAmnt($request, 'cat_' . $i);
        }

        // Update the cycle count data
        $cycleCount->update([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'inv_adjustment' => $request->inv_adjustment,
            'sku_count' => $request->sku_count,
        ]);

        // Add category data to the cycle count data
        for ($i = 1; $i <= 28; $i++) {
            $cycleCount->update([
                'category_' . $i . '_title' => $categoryTitle[$i],
                'category_' . $i . '_items' => json_encode($categoryItemsData[$i]),
                'category_' . $i . '_amount' => json_encode($categoryAmountData[$i]),
            ]);
        }

        // Redirect to the specified URL with the updated record's ID
        return redirect()->back()->with('status', 'Your data updated successfully');
    }


    // Assume you have a function to get the category title
    private function getCategoryTitle(Request $request, $prefix)
    {
        return $request->input($prefix);
    }

    private function getCategoryFormItem(Request $request, $prefix)
    {
        $data = [];
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'total'];

        foreach ($months as $month) {
            $itemName = $prefix . '_' . $month . '_item';
            $data[$month] = $request->input($itemName);
        }

        return $data;
    }
    private function getCategoryFormIAmnt(Request $request, $prefix)
    {
        $data = [];
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec', 'total'];

        foreach ($months as $month) {
            $amountName = $prefix . '_' . $month . '_amnt';
            $data[$month] = $request->input($amountName);
        }

        return $data;
    }


}
