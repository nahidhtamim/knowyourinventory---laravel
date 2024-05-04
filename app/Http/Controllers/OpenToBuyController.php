<?php

namespace App\Http\Controllers;

use App\Models\OpenBuy;
use App\Models\Page;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpenToBuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Open Open To Buy Form Page ===== //
    public function index()
    {
        $pages = Page::where('status', '1')->get();
        return view('templates.open-buy.index', compact('pages'));
    }

    // ===== Show Open To Buy Data ===== //
    public function open_buy_details($id)
    {
        $pages = Page::where('status', '1')->get();
        $openBuyData = OpenBuy::find($id);
        return view('templates.open-buy.details', compact('pages', 'openBuyData'));
    }

    public function view_pdf_open_buy($id)
    {
        $openBuyData = OpenBuy::find($id);
        $pdf = PDF::loadView('templates.open-buy.pdf',compact('openBuyData'))->setPaper('a4', 'landscape');
        return $pdf->download('open-buy.pdf');
    }

    // ===== Save Open To Buy Form Data ===== //
    public function save_open_buy(Request $request)
    {
        // Retrieve data from the request using the getFormData method
        $invTar = $this->getFormData($request, 'inv_tar');
        $invVal = $this->getFormData($request, 'inv_val');
        $retSale = $this->getFormData($request, 'ret_sale');
        $cogs = $this->getFormData($request, 'cogs');
        $margin = $this->getFormData($request, 'margin');
        $lySalesInvoice = $this->getFormData($request, 'ly_sales');
        $salesChangeTotal = $this->getFormData($request, 'sales_change');
        $plannedSales = $this->getFormData($request, 'planned_sales');
        $inventoryOnOrder = $this->getFormData($request, 'inventory_on_order');
        $inventoryPurchased = $this->getFormData($request, 'inventory_purchased');
        $inventoryOnHand = $this->getFormData($request, 'inventory_on_hand');
        $inventorySold = $this->getFormData($request, 'inventory_sold');
        $inventoryTurnover = $this->getFormData($request, 'inventory_turnover');
        $daysSupply = $this->getFormData($request, 'days_supply');
        $sellThrough = $this->getFormData($request, 'sell_through');
        $stockSales = $this->getFormData($request, 'stock_sales');

        $salesOutput = $this->getMonthData($request, 'sales_output');
        $endingInvOutput = $this->getMonthData($request, 'ending_inv_output');
        $beginInvOutput = $this->getMonthData($request, 'begin_inv_output');
        $otb = $this->getMonthData($request, 'otb');
        $onOrderOutput = $this->getMonthData($request, 'on_order_output');
        $netMtbOutput = $this->getMonthData($request, 'net_mtb_output');
        $turnsOutput = $this->getMonthData($request, 'turns_output');

        // Save data to the OpenBuy model
        $openBuy = OpenBuy::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'inv_tar' => json_encode($invTar),
            'inv_val' => json_encode($invVal),
            'ret_sale' => json_encode($retSale),
            'cogs' => json_encode($cogs),
            'margin' => json_encode($margin),
            'ly_sales' => json_encode($lySalesInvoice),
            'sales_change' => json_encode($salesChangeTotal),
            'planned_sales' => json_encode($plannedSales),
            'inventory_on_order' => json_encode($inventoryOnOrder),
            'inventory_purchased' => json_encode($inventoryPurchased),
            'inventory_on_hand' => json_encode($inventoryOnHand),
            'inventory_sold' => json_encode($inventorySold),
            'inventory_turnover' => json_encode($inventoryTurnover),
            'days_supply' => json_encode($daysSupply),
            'sell_through' => json_encode($sellThrough),
            'stock_sales' => json_encode($stockSales),

            'sales_output' => json_encode($salesOutput),
            'ending_inv_output' => json_encode($endingInvOutput),
            'begin_inv_output' => json_encode($beginInvOutput),
            'otb' => json_encode($otb),
            'on_order_output' => json_encode($onOrderOutput),
            'net_mtb_output' => json_encode($netMtbOutput),
            'turns_output' => json_encode($turnsOutput),
        ]);

        return redirect()->route('edit.open.buy', $openBuy->id)->with('status', 'Your data saved successfully');
    }


    // ===== Edit Open To Buy Data ===== //
    public function edit_open_buy($id)
    {
        $pages = Page::where('status', '1')->get();
        $openBuyData = OpenBuy::find($id);
        return view('templates.open-buy.edit', compact('pages', 'openBuyData'));
    }

    public function update_open_buy(Request $request, $id)
    {
        // Retrieve the existing record
        $openBuy = OpenBuy::findOrFail($id);

        // Retrieve data from the request using the getFormData and getMonthData methods
        $invTar = $this->getFormData($request, 'inv_tar');
        $invVal = $this->getFormData($request, 'inv_val');
        $retSale = $this->getFormData($request, 'ret_sale');
        $cogs = $this->getFormData($request, 'cogs');
        $margin = $this->getFormData($request, 'margin');
        $lySalesInvoice = $this->getFormData($request, 'ly_sales');
        $salesChangeTotal = $this->getFormData($request, 'sales_change');
        $plannedSales = $this->getFormData($request, 'planned_sales');
        $inventoryOnOrder = $this->getFormData($request, 'inventory_on_order');
        $inventoryPurchased = $this->getFormData($request, 'inventory_purchased');
        $inventoryOnHand = $this->getFormData($request, 'inventory_on_hand');
        $inventorySold = $this->getFormData($request, 'inventory_sold');
        $inventoryTurnover = $this->getFormData($request, 'inventory_turnover');
        $daysSupply = $this->getFormData($request, 'days_supply');
        $sellThrough = $this->getFormData($request, 'sell_through');
        $stockSales = $this->getFormData($request, 'stock_sales');

        $salesOutput = $this->getMonthData($request, 'sales_output');
        $endingInvOutput = $this->getMonthData($request, 'ending_inv_output');
        $beginInvOutput = $this->getMonthData($request, 'begin_inv_output');
        $otb = $this->getMonthData($request, 'otb');
        $onOrderOutput = $this->getMonthData($request, 'on_order_output');
        $netMtbOutput = $this->getMonthData($request, 'net_mtb_output');
        $turnsOutput = $this->getMonthData($request, 'turns_output');

        // Update the OpenBuy model with the new data
        $openBuy->update([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'inv_tar' => json_encode($invTar),
            'inv_val' => json_encode($invVal),
            'ret_sale' => json_encode($retSale),
            'cogs' => json_encode($cogs),
            'margin' => json_encode($margin),
            'ly_sales' => json_encode($lySalesInvoice),
            'sales_change' => json_encode($salesChangeTotal),
            'planned_sales' => json_encode($plannedSales),
            'inventory_on_order' => json_encode($inventoryOnOrder),
            'inventory_purchased' => json_encode($inventoryPurchased),
            'inventory_on_hand' => json_encode($inventoryOnHand),
            'inventory_sold' => json_encode($inventorySold),
            'inventory_turnover' => json_encode($inventoryTurnover),
            'days_supply' => json_encode($daysSupply),
            'sell_through' => json_encode($sellThrough),
            'stock_sales' => json_encode($stockSales),

            'sales_output' => json_encode($salesOutput),
            'ending_inv_output' => json_encode($endingInvOutput),
            'begin_inv_output' => json_encode($beginInvOutput),
            'otb' => json_encode($otb),
            'on_order_output' => json_encode($onOrderOutput),
            'net_mtb_output' => json_encode($netMtbOutput),
            'turns_output' => json_encode($turnsOutput),
        ]);

        // Redirect to the specified URL with the updated record's ID
        return redirect()->back()->with('status', 'Your data updated successfully');
    }


    private function getFormData(Request $request, $prefix)
    {
        $data = [];
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];

        foreach ($months as $month) {
            $inputName = $month . '_' .$prefix ;
            $data[$month] = $request->input($inputName);
        }

        return $data;
    }
    
    private function getMonthData(Request $request, $prefix)
    {
        $data = [];
        $months = ['dec', 'jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec_two'];

        foreach ($months as $month) {
            $inputName = $month . '_' .$prefix ;
            $data[$month] = $request->input($inputName);
        }

        return $data;
    }
}
