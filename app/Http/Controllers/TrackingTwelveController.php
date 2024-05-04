<?php

namespace App\Http\Controllers;

use App\Models\MonthForecast;
use App\Models\Page;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingTwelveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Open 12 Months Forecast Form Page ===== //
    public function tracking_twelve()
    {
        $pages = Page::where('status', '1')->get();
        return view('templates.tracking-twelve.index', compact('pages'));
    }
    
    // ===== Show 12 Months Forecast Form Data ===== //
    public function tracking_twelve_details($id)
    {
        $pages = Page::where('status', '1')->get();
        $forecastData = MonthForecast::find($id);
        return view('templates.tracking-twelve.details', compact('pages', 'forecastData'));
    }
    
    // ===== Export 12 Months Forecast Form Data ===== //
    public function view_pdf_tracking_twelve($id)
    {
        $forecastData = MonthForecast::find($id);
        $pdf = PDF::loadView('templates.tracking-twelve.pdf',compact('forecastData'))->setPaper('a4', 'portrait');
        return $pdf->download('tracking-twelve.pdf');
    }

    // ===== Save 12 Months Forecast Form Data ===== //
    public function save_tracking_twelve(Request $request)
    {
        $walkInData = $this->getFormData($request, 'walk_in');
        $webPurchaseData = $this->getFormData($request, 'web_purchase');
        $totalOneData = $this->getFormData($request, 'first_total');
        $estimatedPurchaseData = $this->getFormData($request, 'estimated_purchase');
        $totalTwoData = $this->getFormData($request, 'second_total');
        $perInvoice = $this->getFormData($request, 'per_invoice');
        $monthlyTotal = $this->getFormData($request, 'monthly_sales');
        $businessDays = $this->getFormData($request, 'business_days');
        $perDays = $this->getFormData($request, 'per_days');
        $estimator = $this->getFormData($request, 'estimator');

        $monthForecast = [
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'walk_in' => json_encode($walkInData),
            'web_purchase' => json_encode($webPurchaseData),
            'total_one' => json_encode($totalOneData),
            'estimated_purchase' => json_encode($estimatedPurchaseData),
            'total_two' => json_encode($totalTwoData),
            'per_invoice' => json_encode($perInvoice),
            'monthly_total' => json_encode($monthlyTotal),
            'business_days' => json_encode($businessDays),
            'per_day' => json_encode($perDays),
            'walk_in_per_day' => json_encode($estimator),
        ]; 

        $tt = MonthForecast::create($monthForecast);


        return redirect()->route('edit.tracking.twelve', $tt->id)->with('status', 'Your data saved successfully');
    }

    // ===== Edit 12 Months Forecast Form Data ===== //
    public function edit_tracking_twelve($id)
    {
        $pages = Page::where('status', '1')->get();
        $forecastData = MonthForecast::find($id);
        return view('templates.tracking-twelve.edit', compact('pages', 'forecastData'));
    }

    // ===== Save 12 Months Forecast Form Data ===== //
    public function update_tracking_twelve(Request $request, $id)
    {
        // Retrieve the existing record
        $monthForecast = MonthForecast::findOrFail($id);

        // Similar to the create part
        $walkInData = $this->getFormData($request, 'walk_in');
        $webPurchaseData = $this->getFormData($request, 'web_purchase');
        $totalOneData = $this->getFormData($request, 'first_total');
        $estimatedPurchaseData = $this->getFormData($request, 'estimated_purchase');
        $totalTwoData = $this->getFormData($request, 'second_total');
        $perInvoice = $this->getFormData($request, 'per_invoice');
        $monthlyTotal = $this->getFormData($request, 'monthly_sales');
        $businessDays = $this->getFormData($request, 'business_days');
        $perDays = $this->getFormData($request, 'per_days');
        $estimator = $this->getFormData($request, 'estimator');

        // Update the existing record
        $monthForecast->update([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'walk_in' => json_encode($walkInData),
            'web_purchase' => json_encode($webPurchaseData),
            'total_one' => json_encode($totalOneData),
            'estimated_purchase' => json_encode($estimatedPurchaseData),
            'total_two' => json_encode($totalTwoData),
            'per_invoice' => json_encode($perInvoice),
            'monthly_total' => json_encode($monthlyTotal),
            'business_days' => json_encode($businessDays),
            'per_day' => json_encode($perDays),
            'walk_in_per_day' => json_encode($estimator),
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
}
