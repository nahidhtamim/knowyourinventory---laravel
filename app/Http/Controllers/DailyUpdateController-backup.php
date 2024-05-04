<?php

namespace App\Http\Controllers;

use App\Models\DailyUpdate;
use App\Models\Page;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DailyUpdateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===== Open Daily Update Form Page ===== //
    public function index()
    {
        $pages = Page::where('status', '1')->get();
        return view('templates.daily-update.index', compact('pages'));
    }

    // ===== Show Daily Update Data ===== //
    public function daily_update_details($id)
    {
        $pages = Page::where('status', '1')->get();
        $dailyUpdateData = DailyUpdate::find($id);
        return view('templates.daily-update.details', compact('pages', 'dailyUpdateData'));
    }

    public function view_pdf_daily_update($id)
    {
        $dailyUpdateData = DailyUpdate::find($id);
        $pdf = PDF::loadView('templates.daily-update.pdf',compact('dailyUpdateData'))->setPaper('letter', 'landscape');
        return $pdf->download('daily-update.pdf');
    }

    public function save_daily_update(Request $request)
    {

        $dailyUpdateData = [
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'name_one' => $request->name_one,
            'amount_one' => $request->amount_one,
            'name_two' => $request->name_two,
            'amount_two' => $request->amount_two,
            'name_three' => $request->name_three,
            'amount_three' => $request->amount_three,
            'name_four' => $request->name_four,
            'amount_four' => $request->amount_four,
            'total_amount' => $request->total_amount,
            'goals_sum' => $request->goals_sum,
            'name_one_sales_sum' => $request->name_one_sales_sum,
            'name_one_inv_sum' => $request->name_one_inv_sum,
            'name_one_lines_sum' => $request->name_one_lines_sum,
            'name_two_sales_sum' => $request->name_two_sales_sum,
            'name_two_inv_sum' => $request->name_two_inv_sum,
            'name_two_lines_sum' => $request->name_two_lines_sum,
            'name_three_sales_sum' => $request->name_three_sales_sum,
            'name_three_inv_sum' => $request->name_three_inv_sum,
            'name_three_lines_sum' => $request->name_three_lines_sum,
            'name_four_sales_sum' => $request->name_four_sales_sum,
            'name_four_inv_sum' => $request->name_four_inv_sum,
            'name_four_lines_sum' => $request->name_four_lines_sum,
            'mo_total_goal_sum' => $request->mo_total_goal_sum,
            'mo_total_sales_sum' => $request->mo_total_sales_sum,
            'mo_total_inv_sum' => $request->mo_total_inv_sum,
            'mo_total_lines_sum' => $request->mo_total_lines_sum,
            'mo_total_LPI_sum' => $request->mo_total_LPI_sum,
            'mo_total_dlr_inv_sum' => $request->mo_total_dlr_inv_sum,
            'mo_name_one_sales_sum' => $request->mo_name_one_sales_sum,
            'mo_name_one_inv_sum' => $request->mo_name_one_inv_sum,
            'mo_name_one_lines_sum' => $request->mo_name_one_lines_sum,
            'mo_name_one_LPI_sum' => $request->mo_name_one_LPI_sum,
            'mo_name_one_dlr_inv_sum' => $request->mo_name_one_dlr_inv_sum,
            'mo_name_two_sales_sum' => $request->mo_name_two_sales_sum,
            'mo_name_two_inv_sum' => $request->mo_name_two_inv_sum,
            'mo_name_two_lines_sum' => $request->mo_name_two_lines_sum,
            'mo_name_two_LPI_sum' => $request->mo_name_two_LPI_sum,
            'mo_name_two_dlr_inv_sum' => $request->mo_name_two_dlr_inv_sum,
            'mo_name_three_sales_sum' => $request->mo_name_three_sales_sum,
            'mo_name_three_inv_sum' => $request->mo_name_three_inv_sum,
            'mo_name_three_lines_sum' => $request->mo_name_three_lines_sum,
            'mo_name_three_LPI_sum' => $request->mo_name_three_LPI_sum,
            'mo_name_three_dlr_inv_sum' => $request->mo_name_three_dlr_inv_sum,
            'mo_name_four_sales_sum' => $request->mo_name_four_sales_sum,
            'mo_name_four_inv_sum' => $request->mo_name_four_inv_sum,
            'mo_name_four_lines_sum' => $request->mo_name_four_lines_sum,
            'mo_name_four_LPI_sum' => $request->mo_name_four_LPI_sum,
            'mo_name_four_dlr_inv_sum' => $request->mo_name_four_dlr_inv_sum,
            'total_dept_goal' => $request->total_dept_goal,
            'total_dept_sale' => $request->total_dept_sale,
            'total_dept_pace' => $request->total_dept_pace,
            'name_one_dept_goal' => $request->name_one_dept_goal,
            'name_one_dept_sale' => $request->name_one_dept_sale,
            'name_one_dept_pace' => $request->name_one_dept_pace,
            'name_two_dept_goal' => $request->name_two_dept_goal,
            'name_two_dept_sale' => $request->name_two_dept_sale,
            'name_two_dept_pace' => $request->name_two_dept_pace,
            'name_three_dept_goal' => $request->name_three_dept_goal,
            'name_three_dept_sale' => $request->name_three_dept_sale,
            'name_three_dept_pace' => $request->name_three_dept_pace,
            'name_four_dept_goal' => $request->name_four_dept_goal,
            'name_four_dept_sale' => $request->name_four_dept_sale,
            'name_four_dept_pace' => $request->name_four_dept_pace,
            'sales_standing_one_value' => $request->sales_standing_one_value,
            'sales_standing_two_value' => $request->sales_standing_two_value,
            'sales_standing_three_value' => $request->sales_standing_three_value,
            'sales_standing_four_value' => $request->sales_standing_four_value,
            'dlr_per_inv_one_value' => $request->dlr_per_inv_one_value,
            'dlr_per_inv_two_value' => $request->dlr_per_inv_two_value,
            'dlr_per_inv_three_value' => $request->dlr_per_inv_three_value,
            'dlr_per_inv_four_value' => $request->dlr_per_inv_four_value,
            'total_LPI_one_value' => $request->total_LPI_one_value,
            'total_LPI_two_value' => $request->total_LPI_two_value,
            'total_LPI_three_value' => $request->total_LPI_three_value,
            'total_LPI_four_value' => $request->total_LPI_four_value,
            'daily_date_sum' => $request->daily_date_sum,
            'daily_retail_sum' => $request->daily_retail_sum,
            'daily_ly1_sum' => $request->daily_ly1_sum,
            'daily_cost_sum' => $request->daily_cost_sum,
            'daily_margin_sum' => $request->daily_margin_sum,
            'daily_sales_goal_sum' => $request->daily_sales_goal_sum,
            'daily_ou1_sum' => $request->daily_ou1_sum,
            'daily_current_sum' => $request->daily_current_sum,
            'daily_ly2_sum' => $request->daily_ly2_sum,
            'daily_goal_sum' => $request->daily_goal_sum,
            'daily_ou2_sum' => $request->daily_ou2_sum,
            'daily_tracking' => $request->daily_tracking,
            'daily_actual' => $request->daily_actual,
            'daily_actual_goal' => $request->daily_actual_goal,
            'daily_on_track' => $request->daily_on_track,
            'daily_no_business_days' => $request->daily_no_business_days,
            'daily_on_above_below' => $request->daily_on_above_below,
        ];

        // Initialize arrays to store category data
        $dailyUpdateData['goals'] = [];
        $dailyUpdateData['day'] = [];

        $dailyUpdateData['name_one_sales'] = [];
        $dailyUpdateData['name_one_inv'] = [];
        $dailyUpdateData['name_one_lines'] = [];
        $dailyUpdateData['name_two_sales'] = [];
        $dailyUpdateData['name_two_inv'] = [];
        $dailyUpdateData['name_two_lines'] = [];
        $dailyUpdateData['name_three_sales'] = [];
        $dailyUpdateData['name_three_inv'] = [];
        $dailyUpdateData['name_three_lines'] = [];
        $dailyUpdateData['name_four_sales'] = [];
        $dailyUpdateData['name_four_inv'] = [];
        $dailyUpdateData['name_four_lines'] = [];

        $dailyUpdateData['mo_total_goal'] = [];
        $dailyUpdateData['mo_total_sales'] = [];
        $dailyUpdateData['mo_total_inv'] = [];
        $dailyUpdateData['mo_total_lines'] = [];
        $dailyUpdateData['mo_total_LPI'] = [];
        $dailyUpdateData['mo_total_dlr_inv'] = [];

        $dailyUpdateData['mo_name_one_sales'] = [];
        $dailyUpdateData['mo_name_one_inv'] = [];
        $dailyUpdateData['mo_name_one_lines'] = [];
        $dailyUpdateData['mo_name_one_LPI'] = [];
        $dailyUpdateData['mo_name_one_dlr_inv'] = [];

        $dailyUpdateData['mo_name_two_sales'] = [];
        $dailyUpdateData['mo_name_two_inv'] = [];
        $dailyUpdateData['mo_name_two_lines'] = [];
        $dailyUpdateData['mo_name_two_LPI'] = [];
        $dailyUpdateData['mo_name_two_dlr_inv'] = [];

        $dailyUpdateData['mo_name_three_sales'] = [];
        $dailyUpdateData['mo_name_three_inv'] = [];
        $dailyUpdateData['mo_name_three_lines'] = [];
        $dailyUpdateData['mo_name_three_LPI'] = [];
        $dailyUpdateData['mo_name_three_dlr_inv'] = [];

        $dailyUpdateData['mo_name_four_sales'] = [];
        $dailyUpdateData['mo_name_four_inv'] = [];
        $dailyUpdateData['mo_name_four_lines'] = [];
        $dailyUpdateData['mo_name_four_LPI'] = [];
        $dailyUpdateData['mo_name_four_dlr_inv'] = [];

        $dailyUpdateData['daily_retail'] = [];
        $dailyUpdateData['daily_ly1'] = [];
        $dailyUpdateData['daily_cost'] = [];
        $dailyUpdateData['daily_margin'] = [];
        $dailyUpdateData['daily_sales_goal'] = [];
        $dailyUpdateData['daily_ou1'] = [];
        $dailyUpdateData['daily_current'] = [];
        $dailyUpdateData['daily_ly2'] = [];
        $dailyUpdateData['daily_goal'] = [];
        $dailyUpdateData['daily_ou2'] = [];

        for ($day = 1; $day <= 31; $day++) {
            $dailyUpdateData['goals'][$day] = $request->input("goals_$day") ?? '';
            $dailyUpdateData['day'][$day] = $request->input("day_$day") ?? '';
        
            // ... (other code)
        
            $fields = ['name_one', 'name_two', 'name_three', 'name_four'];
            foreach ($fields as $field) {
                $dailyUpdateData["{$field}_sales"][$day] = $request->input("{$field}_sales_$day") ?? '';
                $dailyUpdateData["{$field}_inv"][$day] = $request->input("{$field}_inv_$day") ?? '';
                $dailyUpdateData["{$field}_lines"][$day] = $request->input("{$field}_lines_$day") ?? '';
            }
        
            $components = ['mo_total', 'mo_name_one', 'mo_name_two', 'mo_name_three', 'mo_name_four'];
            foreach ($components as $component) {
                $dailyUpdateData["{$component}_goal"][$day] = $request->input("{$component}_goal_$day") ?? '';
                $dailyUpdateData["{$component}_sales"][$day] = $request->input("{$component}_sales_$day") ?? '';
                $dailyUpdateData["{$component}_inv"][$day] = $request->input("{$component}_inv_$day") ?? '';
                $dailyUpdateData["{$component}_lines"][$day] = $request->input("{$component}_lines_$day") ?? '';
                $dailyUpdateData["{$component}_LPI"][$day] = $request->input("{$component}_LPI_$day") ?? '';
                $dailyUpdateData["{$component}_dlr_inv"][$day] = $request->input("{$component}_dlr_inv_$day") ?? '';
            }
        
            $dailyUpdateData['daily_retail'][$day] = $request->input("daily_retail_$day") ?? '';
            $dailyUpdateData['daily_ly1'][$day] = $request->input("daily_ly1_$day") ?? '';
            $dailyUpdateData['daily_cost'][$day] = $request->input("daily_cost_$day") ?? '';
            $dailyUpdateData['daily_margin'][$day] = $request->input("daily_margin_$day") ?? '';
            $dailyUpdateData['daily_sales_goal'][$day] = $request->input("daily_sales_goal_$day") ?? '';
            $dailyUpdateData['daily_ou1'][$day] = $request->input("daily_ou1_$day") ?? '';
            $dailyUpdateData['daily_current'][$day] = $request->input("daily_current_$day") ?? '';
            $dailyUpdateData['daily_ly2'][$day] = $request->input("daily_ly2_$day") ?? '';
            $dailyUpdateData['daily_goal'][$day] = $request->input("daily_goal_$day") ?? '';
            $dailyUpdateData['daily_ou2'][$day] = $request->input("daily_ou2_$day") ?? '';
        }
        
        

        foreach ($dailyUpdateData as $key => $value) {
            if (is_array($value)) {
                $dailyUpdateData[$key] = json_encode($value);
            }
        }
        
        
        // Debugging: Dump and die the request data
        //dd($request->all());
        //Save the data to the database
        //DailyUpdate::create($dailyUpdateData);
        //dd($dailyUpdateData);
        try {
            // Save the data to the database
            $dailyUpdate = DailyUpdate::create($dailyUpdateData);
        } catch (\Exception $e) {
            // Log or print the exception message for further investigation
            dd($e->getMessage());
        }
        

        return redirect()->route('edit.daily.update', $dailyUpdate->id)->with('status', 'Your data saved successfully');
    }

    // ===== Edit Daily Update Data ===== //
    public function edit_daily_update($id)
    {
        $pages = Page::where('status', '1')->get();
        $dailyUpdateData = DailyUpdate::find($id);
        return view('templates.daily-update.edit', compact('pages', 'dailyUpdateData'));
    }

    

    public function update_daily_update(Request $request, $id)
    {

        // Retrieve the existing record from the database
        $dailyUpdateData = DailyUpdate::findOrFail($id);

        $dailyUpdateData->title =  $request->title;
        $dailyUpdateData->user_id =  Auth::user()->id;
        $dailyUpdateData->name_one =  $request->name_one;
        $dailyUpdateData->amount_one =  $request->amount_one;
        $dailyUpdateData->name_two =  $request->name_two;
        $dailyUpdateData->amount_two =  $request->amount_two;
        $dailyUpdateData->name_three =  $request->name_three;
        $dailyUpdateData->amount_three =  $request->amount_three;
        $dailyUpdateData->name_four =  $request->name_four;
        $dailyUpdateData->amount_four =  $request->amount_four;
        $dailyUpdateData->total_amount =  $request->total_amount;
        $dailyUpdateData->goals_sum =  $request->goals_sum;
        $dailyUpdateData->name_one_sales_sum =  $request->name_one_sales_sum;
        $dailyUpdateData->name_one_inv_sum =  $request->name_one_inv_sum;
        $dailyUpdateData->name_one_lines_sum =  $request->name_one_lines_sum;
        $dailyUpdateData->name_two_sales_sum =  $request->name_two_sales_sum;
        $dailyUpdateData->name_two_inv_sum =  $request->name_two_inv_sum;
        $dailyUpdateData->name_two_lines_sum =  $request->name_two_lines_sum;
        $dailyUpdateData->name_three_sales_sum =  $request->name_three_sales_sum;
        $dailyUpdateData->name_three_inv_sum =  $request->name_three_inv_sum;
        $dailyUpdateData->name_three_lines_sum =  $request->name_three_lines_sum;
        $dailyUpdateData->name_four_sales_sum =  $request->name_four_sales_sum;
        $dailyUpdateData->name_four_inv_sum =  $request->name_four_inv_sum;
        $dailyUpdateData->name_four_lines_sum =  $request->name_four_lines_sum;
        $dailyUpdateData->mo_total_goal_sum =  $request->mo_total_goal_sum;
        $dailyUpdateData->mo_total_sales_sum =  $request->mo_total_sales_sum;
        $dailyUpdateData->mo_total_inv_sum =  $request->mo_total_inv_sum;
        $dailyUpdateData->mo_total_lines_sum =  $request->mo_total_lines_sum;
        $dailyUpdateData->mo_total_LPI_sum =  $request->mo_total_LPI_sum;
        $dailyUpdateData->mo_total_dlr_inv_sum =  $request->mo_total_dlr_inv_sum;
        $dailyUpdateData->mo_name_one_sales_sum =  $request->mo_name_one_sales_sum;
        $dailyUpdateData->mo_name_one_inv_sum =  $request->mo_name_one_inv_sum;
        $dailyUpdateData->mo_name_one_lines_sum =  $request->mo_name_one_lines_sum;
        $dailyUpdateData->mo_name_one_LPI_sum =  $request->mo_name_one_LPI_sum;
        $dailyUpdateData->mo_name_one_dlr_inv_sum =  $request->mo_name_one_dlr_inv_sum;
        $dailyUpdateData->mo_name_two_sales_sum =  $request->mo_name_two_sales_sum;
        $dailyUpdateData->mo_name_two_inv_sum =  $request->mo_name_two_inv_sum;
        $dailyUpdateData->mo_name_two_lines_sum =  $request->mo_name_two_lines_sum;
        $dailyUpdateData->mo_name_two_LPI_sum =  $request->mo_name_two_LPI_sum;
        $dailyUpdateData->mo_name_two_dlr_inv_sum =  $request->mo_name_two_dlr_inv_sum;
        $dailyUpdateData->mo_name_three_sales_sum =  $request->mo_name_three_sales_sum;
        $dailyUpdateData->mo_name_three_inv_sum =  $request->mo_name_three_inv_sum;
        $dailyUpdateData->mo_name_three_lines_sum =  $request->mo_name_three_lines_sum;
        $dailyUpdateData->mo_name_three_LPI_sum =  $request->mo_name_three_LPI_sum;
        $dailyUpdateData->mo_name_three_dlr_inv_sum =  $request->mo_name_three_dlr_inv_sum;
        $dailyUpdateData->mo_name_four_sales_sum =  $request->mo_name_four_sales_sum;
        $dailyUpdateData->mo_name_four_inv_sum =  $request->mo_name_four_inv_sum;
        $dailyUpdateData->mo_name_four_lines_sum =  $request->mo_name_four_lines_sum;
        $dailyUpdateData->mo_name_four_LPI_sum =  $request->mo_name_four_LPI_sum;
        $dailyUpdateData->mo_name_four_dlr_inv_sum =  $request->mo_name_four_dlr_inv_sum;
        $dailyUpdateData->total_dept_goal =  $request->total_dept_goal;
        $dailyUpdateData->total_dept_sale =  $request->total_dept_sale;
        $dailyUpdateData->total_dept_pace =  $request->total_dept_pace;
        $dailyUpdateData->name_one_dept_goal =  $request->name_one_dept_goal;
        $dailyUpdateData->name_one_dept_sale =  $request->name_one_dept_sale;
        $dailyUpdateData->name_one_dept_pace =  $request->name_one_dept_pace;
        $dailyUpdateData->name_two_dept_goal =  $request->name_two_dept_goal;
        $dailyUpdateData->name_two_dept_sale =  $request->name_two_dept_sale;
        $dailyUpdateData->name_two_dept_pace =  $request->name_two_dept_pace;
        $dailyUpdateData->name_three_dept_goal =  $request->name_three_dept_goal;
        $dailyUpdateData->name_three_dept_sale =  $request->name_three_dept_sale;
        $dailyUpdateData->name_three_dept_pace =  $request->name_three_dept_pace;
        $dailyUpdateData->name_four_dept_goal =  $request->name_four_dept_goal;
        $dailyUpdateData->name_four_dept_sale =  $request->name_four_dept_sale;
        $dailyUpdateData->name_four_dept_pace =  $request->name_four_dept_pace;

        $dailyUpdateData->sales_standing_one_value =  $request->sales_standing_one_value;
        $dailyUpdateData->sales_standing_two_value =  $request->sales_standing_two_value;
        $dailyUpdateData->sales_standing_three_value =  $request->sales_standing_three_value;
        $dailyUpdateData->sales_standing_four_value =  $request->sales_standing_four_value;
        $dailyUpdateData->dlr_per_inv_one_value =  $request->dlr_per_inv_one_value;
        $dailyUpdateData->dlr_per_inv_two_value =  $request->dlr_per_inv_two_value;
        $dailyUpdateData->dlr_per_inv_three_value =  $request->dlr_per_inv_three_value;
        $dailyUpdateData->dlr_per_inv_four_value =  $request->dlr_per_inv_four_value;
        $dailyUpdateData->total_LPI_one_value =  $request->total_LPI_one_value;
        $dailyUpdateData->total_LPI_two_value =  $request->total_LPI_two_value;
        $dailyUpdateData->total_LPI_three_value =  $request->total_LPI_three_value;
        $dailyUpdateData->total_LPI_four_value =  $request->total_LPI_four_value;
        $dailyUpdateData->daily_date_sum =  $request->daily_date_sum;
        $dailyUpdateData->daily_retail_sum =  $request->daily_retail_sum;
        $dailyUpdateData->daily_ly1_sum =  $request->daily_ly1_sum;
        $dailyUpdateData->daily_cost_sum =  $request->daily_cost_sum;
        $dailyUpdateData->daily_margin_sum =  $request->daily_margin_sum;
        $dailyUpdateData->daily_sales_goal_sum =  $request->daily_sales_goal_sum;
        $dailyUpdateData->daily_ou1_sum =  $request->daily_ou1_sum;
        $dailyUpdateData->daily_current_sum =  $request->daily_current_sum;
        $dailyUpdateData->daily_ly2_sum =  $request->daily_ly2_sum;
        $dailyUpdateData->daily_goal_sum =  $request->daily_goal_sum;
        $dailyUpdateData->daily_ou2_sum =  $request->daily_ou2_sum;
        $dailyUpdateData->daily_tracking =  $request->daily_tracking;
        $dailyUpdateData->daily_actual =  $request->daily_actual;
        $dailyUpdateData->daily_actual_goal =  $request->daily_actual_goal;
        $dailyUpdateData->daily_on_track =  $request->daily_on_track;
        $dailyUpdateData->daily_no_business_days =  $request->daily_no_business_days;
        $dailyUpdateData->daily_on_above_below =  $request->daily_on_above_below;


        // Initialize arrays to store category data
        $dailyUpdateData['goals'] = [];
        $dailyUpdateData['day'] = [];

        $dailyUpdateData['name_one_sales'] = [];
        $dailyUpdateData['name_one_inv'] = [];
        $dailyUpdateData['name_one_lines'] = [];
        $dailyUpdateData['name_two_sales'] = [];
        $dailyUpdateData['name_two_inv'] = [];
        $dailyUpdateData['name_two_lines'] = [];
        $dailyUpdateData['name_three_sales'] = [];
        $dailyUpdateData['name_three_inv'] = [];
        $dailyUpdateData['name_three_lines'] = [];
        $dailyUpdateData['name_four_sales'] = [];
        $dailyUpdateData['name_four_inv'] = [];
        $dailyUpdateData['name_four_lines'] = [];

        $dailyUpdateData['mo_total_goal'] = [];
        $dailyUpdateData['mo_total_sales'] = [];
        $dailyUpdateData['mo_total_inv'] = [];
        $dailyUpdateData['mo_total_lines'] = [];
        $dailyUpdateData['mo_total_LPI'] = [];
        $dailyUpdateData['mo_total_dlr_inv'] = [];

        $dailyUpdateData['mo_name_one_sales'] = [];
        $dailyUpdateData['mo_name_one_inv'] = [];
        $dailyUpdateData['mo_name_one_lines'] = [];
        $dailyUpdateData['mo_name_one_LPI'] = [];
        $dailyUpdateData['mo_name_one_dlr_inv'] = [];

        $dailyUpdateData['mo_name_two_sales'] = [];
        $dailyUpdateData['mo_name_two_inv'] = [];
        $dailyUpdateData['mo_name_two_lines'] = [];
        $dailyUpdateData['mo_name_two_LPI'] = [];
        $dailyUpdateData['mo_name_two_dlr_inv'] = [];

        $dailyUpdateData['mo_name_three_sales'] = [];
        $dailyUpdateData['mo_name_three_inv'] = [];
        $dailyUpdateData['mo_name_three_lines'] = [];
        $dailyUpdateData['mo_name_three_LPI'] = [];
        $dailyUpdateData['mo_name_three_dlr_inv'] = [];

        $dailyUpdateData['mo_name_four_sales'] = [];
        $dailyUpdateData['mo_name_four_inv'] = [];
        $dailyUpdateData['mo_name_four_lines'] = [];
        $dailyUpdateData['mo_name_four_LPI'] = [];
        $dailyUpdateData['mo_name_four_dlr_inv'] = [];

        $dailyUpdateData['daily_retail'] = [];
        $dailyUpdateData['daily_ly1'] = [];
        $dailyUpdateData['daily_cost'] = [];
        $dailyUpdateData['daily_margin'] = [];
        $dailyUpdateData['daily_sales_goal'] = [];
        $dailyUpdateData['daily_ou1'] = [];
        $dailyUpdateData['daily_current'] = [];
        $dailyUpdateData['daily_ly2'] = [];
        $dailyUpdateData['daily_goal'] = [];
        $dailyUpdateData['daily_ou2'] = [];

        for ($day = 1; $day <= 31; $day++) {
            $dailyUpdateData['goals'][$day] = $request->input("goals_$day") ?? '';
            $dailyUpdateData['day'][$day] = $request->input("day_$day") ?? '';
        
            // ... (other code)
        
            $fields = ['name_one', 'name_two', 'name_three', 'name_four'];
            foreach ($fields as $field) {
                $dailyUpdateData["{$field}_sales"][$day] = $request->input("{$field}_sales_$day") ?? '';
                $dailyUpdateData["{$field}_inv"][$day] = $request->input("{$field}_inv_$day") ?? '';
                $dailyUpdateData["{$field}_lines"][$day] = $request->input("{$field}_lines_$day") ?? '';
            }
        
            $components = ['mo_total', 'mo_name_one', 'mo_name_two', 'mo_name_three', 'mo_name_four'];
            foreach ($components as $component) {
                $dailyUpdateData["{$component}_goal"][$day] = $request->input("{$component}_goal_$day") ?? '';
                $dailyUpdateData["{$component}_sales"][$day] = $request->input("{$component}_sales_$day") ?? '';
                $dailyUpdateData["{$component}_inv"][$day] = $request->input("{$component}_inv_$day") ?? '';
                $dailyUpdateData["{$component}_lines"][$day] = $request->input("{$component}_lines_$day") ?? '';
                $dailyUpdateData["{$component}_LPI"][$day] = $request->input("{$component}_LPI_$day") ?? '';
                $dailyUpdateData["{$component}_dlr_inv"][$day] = $request->input("{$component}_dlr_inv_$day") ?? '';
            }
        
            $dailyUpdateData['daily_retail'][$day] = $request->input("daily_retail_$day") ?? '';
            $dailyUpdateData['daily_ly1'][$day] = $request->input("daily_ly1_$day") ?? '';
            $dailyUpdateData['daily_cost'][$day] = $request->input("daily_cost_$day") ?? '';
            $dailyUpdateData['daily_margin'][$day] = $request->input("daily_margin_$day") ?? '';
            $dailyUpdateData['daily_sales_goal'][$day] = $request->input("daily_sales_goal_$day") ?? '';
            $dailyUpdateData['daily_ou1'][$day] = $request->input("daily_ou1_$day") ?? '';
            $dailyUpdateData['daily_current'][$day] = $request->input("daily_current_$day") ?? '';
            $dailyUpdateData['daily_ly2'][$day] = $request->input("daily_ly2_$day") ?? '';
            $dailyUpdateData['daily_goal'][$day] = $request->input("daily_goal_$day") ?? '';
            $dailyUpdateData['daily_ou2'][$day] = $request->input("daily_ou2_$day") ?? '';
        }
        
        

        foreach ($dailyUpdateData as $key => $value) {
            if (is_array($value)) {
                $dailyUpdateData[$key] = json_encode($value);
            }
        }
        
        
        // Debugging: Dump and die the request data
        //dd($request->all());
        //Save the data to the database
        //DailyUpdate::create($dailyUpdateData);
        //dd($dailyUpdateData);
        try {
            // Save the data to the database
            $dailyUpdateData->update();
        } catch (\Exception $e) {
            // Log or print the exception message for further investigation
            dd($e->getMessage());
        }
        

        return redirect()->back()->with('status', 'Your data updated successfully');
    }


    public function update_daily_update(Request $request, $id)
    {

        // Retrieve the existing record from the database
        $dailyUpdate = DailyUpdate::findOrFail($id);

        $dailyUpdate->title =  $request->title;
        $dailyUpdate->user_id =  Auth::user()->id;
        $dailyUpdate->name_one =  $request->name_one;
        $dailyUpdate->amount_one =  $request->amount_one;
        $dailyUpdate->name_two =  $request->name_two;
        $dailyUpdate->amount_two =  $request->amount_two;
        $dailyUpdate->name_three =  $request->name_three;
        $dailyUpdate->amount_three =  $request->amount_three;
        $dailyUpdate->name_four =  $request->name_four;
        $dailyUpdate->amount_four =  $request->amount_four;
        $dailyUpdate->total_amount =  $request->total_amount;
        $dailyUpdate->goals_sum =  $request->goals_sum;
        $dailyUpdate->name_one_sales_sum =  $request->name_one_sales_sum;
        $dailyUpdate->name_one_inv_sum =  $request->name_one_inv_sum;
        $dailyUpdate->name_one_lines_sum =  $request->name_one_lines_sum;
        $dailyUpdate->name_two_sales_sum =  $request->name_two_sales_sum;
        $dailyUpdate->name_two_inv_sum =  $request->name_two_inv_sum;
        $dailyUpdate->name_two_lines_sum =  $request->name_two_lines_sum;
        $dailyUpdate->name_three_sales_sum =  $request->name_three_sales_sum;
        $dailyUpdate->name_three_inv_sum =  $request->name_three_inv_sum;
        $dailyUpdate->name_three_lines_sum =  $request->name_three_lines_sum;
        $dailyUpdate->name_four_sales_sum =  $request->name_four_sales_sum;
        $dailyUpdate->name_four_inv_sum =  $request->name_four_inv_sum;
        $dailyUpdate->name_four_lines_sum =  $request->name_four_lines_sum;
        $dailyUpdate->mo_total_goal_sum =  $request->mo_total_goal_sum;
        $dailyUpdate->mo_total_sales_sum =  $request->mo_total_sales_sum;
        $dailyUpdate->mo_total_inv_sum =  $request->mo_total_inv_sum;
        $dailyUpdate->mo_total_lines_sum =  $request->mo_total_lines_sum;
        $dailyUpdate->mo_total_LPI_sum =  $request->mo_total_LPI_sum;
        $dailyUpdate->mo_total_dlr_inv_sum =  $request->mo_total_dlr_inv_sum;
        $dailyUpdate->mo_name_one_sales_sum =  $request->mo_name_one_sales_sum;
        $dailyUpdate->mo_name_one_inv_sum =  $request->mo_name_one_inv_sum;
        $dailyUpdate->mo_name_one_lines_sum =  $request->mo_name_one_lines_sum;
        $dailyUpdate->mo_name_one_LPI_sum =  $request->mo_name_one_LPI_sum;
        $dailyUpdate->mo_name_one_dlr_inv_sum =  $request->mo_name_one_dlr_inv_sum;
        $dailyUpdate->mo_name_two_sales_sum =  $request->mo_name_two_sales_sum;
        $dailyUpdate->mo_name_two_inv_sum =  $request->mo_name_two_inv_sum;
        $dailyUpdate->mo_name_two_lines_sum =  $request->mo_name_two_lines_sum;
        $dailyUpdate->mo_name_two_LPI_sum =  $request->mo_name_two_LPI_sum;
        $dailyUpdate->mo_name_two_dlr_inv_sum =  $request->mo_name_two_dlr_inv_sum;
        $dailyUpdate->mo_name_three_sales_sum =  $request->mo_name_three_sales_sum;
        $dailyUpdate->mo_name_three_inv_sum =  $request->mo_name_three_inv_sum;
        $dailyUpdate->mo_name_three_lines_sum =  $request->mo_name_three_lines_sum;
        $dailyUpdate->mo_name_three_LPI_sum =  $request->mo_name_three_LPI_sum;
        $dailyUpdate->mo_name_three_dlr_inv_sum =  $request->mo_name_three_dlr_inv_sum;
        $dailyUpdate->mo_name_four_sales_sum =  $request->mo_name_four_sales_sum;
        $dailyUpdate->mo_name_four_inv_sum =  $request->mo_name_four_inv_sum;
        $dailyUpdate->mo_name_four_lines_sum =  $request->mo_name_four_lines_sum;
        $dailyUpdate->mo_name_four_LPI_sum =  $request->mo_name_four_LPI_sum;
        $dailyUpdate->mo_name_four_dlr_inv_sum =  $request->mo_name_four_dlr_inv_sum;
        $dailyUpdate->total_dept_goal =  $request->total_dept_goal;
        $dailyUpdate->total_dept_sale =  $request->total_dept_sale;
        $dailyUpdate->total_dept_pace =  $request->total_dept_pace;
        $dailyUpdate->name_one_dept_goal =  $request->name_one_dept_goal;
        $dailyUpdate->name_one_dept_sale =  $request->name_one_dept_sale;
        $dailyUpdate->name_one_dept_pace =  $request->name_one_dept_pace;
        $dailyUpdate->name_two_dept_goal =  $request->name_two_dept_goal;
        $dailyUpdate->name_two_dept_sale =  $request->name_two_dept_sale;
        $dailyUpdate->name_two_dept_pace =  $request->name_two_dept_pace;
        $dailyUpdate->name_three_dept_goal =  $request->name_three_dept_goal;
        $dailyUpdate->name_three_dept_sale =  $request->name_three_dept_sale;
        $dailyUpdate->name_three_dept_pace =  $request->name_three_dept_pace;
        $dailyUpdate->name_four_dept_goal =  $request->name_four_dept_goal;
        $dailyUpdate->name_four_dept_sale =  $request->name_four_dept_sale;
        $dailyUpdate->name_four_dept_pace =  $request->name_four_dept_pace;

        $dailyUpdate->sales_standing_one_value =  $request->sales_standing_one_value;
        $dailyUpdate->sales_standing_two_value =  $request->sales_standing_two_value;
        $dailyUpdate->sales_standing_three_value =  $request->sales_standing_three_value;
        $dailyUpdate->sales_standing_four_value =  $request->sales_standing_four_value;
        $dailyUpdate->dlr_per_inv_one_value =  $request->dlr_per_inv_one_value;
        $dailyUpdate->dlr_per_inv_two_value =  $request->dlr_per_inv_two_value;
        $dailyUpdate->dlr_per_inv_three_value =  $request->dlr_per_inv_three_value;
        $dailyUpdate->dlr_per_inv_four_value =  $request->dlr_per_inv_four_value;
        $dailyUpdate->total_LPI_one_value =  $request->total_LPI_one_value;
        $dailyUpdate->total_LPI_two_value =  $request->total_LPI_two_value;
        $dailyUpdate->total_LPI_three_value =  $request->total_LPI_three_value;
        $dailyUpdate->total_LPI_four_value =  $request->total_LPI_four_value;
        $dailyUpdate->daily_date_sum =  $request->daily_date_sum;
        $dailyUpdate->daily_retail_sum =  $request->daily_retail_sum;
        $dailyUpdate->daily_ly1_sum =  $request->daily_ly1_sum;
        $dailyUpdate->daily_cost_sum =  $request->daily_cost_sum;
        $dailyUpdate->daily_margin_sum =  $request->daily_margin_sum;
        $dailyUpdate->daily_sales_goal_sum =  $request->daily_sales_goal_sum;
        $dailyUpdate->daily_ou1_sum =  $request->daily_ou1_sum;
        $dailyUpdate->daily_current_sum =  $request->daily_current_sum;
        $dailyUpdate->daily_ly2_sum =  $request->daily_ly2_sum;
        $dailyUpdate->daily_goal_sum =  $request->daily_goal_sum;
        $dailyUpdate->daily_ou2_sum =  $request->daily_ou2_sum;
        $dailyUpdate->daily_tracking =  $request->daily_tracking;
        $dailyUpdate->daily_actual =  $request->daily_actual;
        $dailyUpdate->daily_actual_goal =  $request->daily_actual_goal;
        $dailyUpdate->daily_on_track =  $request->daily_on_track;
        $dailyUpdate->daily_no_business_days =  $request->daily_no_business_days;
        $dailyUpdate->daily_on_above_below =  $request->daily_on_above_below;

        // Initialize arrays to store category data
        $dailyUpdate['goals'] = [];
        $dailyUpdate['day'] = [];

        $dailyUpdate['name_one_sales'] = [];
        $dailyUpdate['name_one_inv'] = [];
        $dailyUpdate['name_one_lines'] = [];
        $dailyUpdate['name_two_sales'] = [];
        $dailyUpdate['name_two_inv'] = [];
        $dailyUpdate['name_two_lines'] = [];
        $dailyUpdate['name_three_sales'] = [];
        $dailyUpdate['name_three_inv'] = [];
        $dailyUpdate['name_three_lines'] = [];
        $dailyUpdate['name_four_sales'] = [];
        $dailyUpdate['name_four_inv'] = [];
        $dailyUpdate['name_four_lines'] = [];

        $dailyUpdate['mo_total_goal'] = [];
        $dailyUpdate['mo_total_sales'] = [];
        $dailyUpdate['mo_total_inv'] = [];
        $dailyUpdate['mo_total_lines'] = [];
        $dailyUpdate['mo_total_LPI'] = [];
        $dailyUpdate['mo_total_dlr_inv'] = [];

        $dailyUpdate['mo_name_one_sales'] = [];
        $dailyUpdate['mo_name_one_inv'] = [];
        $dailyUpdate['mo_name_one_lines'] = [];
        $dailyUpdate['mo_name_one_LPI'] = [];
        $dailyUpdate['mo_name_one_dlr_inv'] = [];

        $dailyUpdate['mo_name_two_sales'] = [];
        $dailyUpdate['mo_name_two_inv'] = [];
        $dailyUpdate['mo_name_two_lines'] = [];
        $dailyUpdate['mo_name_two_LPI'] = [];
        $dailyUpdate['mo_name_two_dlr_inv'] = [];

        $dailyUpdate['mo_name_three_sales'] = [];
        $dailyUpdate['mo_name_three_inv'] = [];
        $dailyUpdate['mo_name_three_lines'] = [];
        $dailyUpdate['mo_name_three_LPI'] = [];
        $dailyUpdate['mo_name_three_dlr_inv'] = [];

        $dailyUpdate['mo_name_four_sales'] = [];
        $dailyUpdate['mo_name_four_inv'] = [];
        $dailyUpdate['mo_name_four_lines'] = [];
        $dailyUpdate['mo_name_four_LPI'] = [];
        $dailyUpdate['mo_name_four_dlr_inv'] = [];

        $dailyUpdate['daily_retail'] = [];
        $dailyUpdate['daily_ly1'] = [];
        $dailyUpdate['daily_cost'] = [];
        $dailyUpdate['daily_margin'] = [];
        $dailyUpdate['daily_sales_goal'] = [];
        $dailyUpdate['daily_ou1'] = [];
        $dailyUpdate['daily_current'] = [];
        $dailyUpdate['daily_ly2'] = [];
        $dailyUpdate['daily_goal'] = [];
        $dailyUpdate['daily_ou2'] = [];

        // Loop through days to update attributes
        for ($day = 1; $day <= 31; $day++) {
            // Update goals and day attributes
            $dailyUpdate->setAttribute("goals", $request->input("goals_$day") ?? '');
            $dailyUpdate->setAttribute("day", $request->input("day_$day") ?? '');

            // Update fields attributes
            $fields = ['name_one', 'name_two', 'name_three', 'name_four'];
            foreach ($fields as $field) {
                $dailyUpdate->setAttribute("{$field}_sales", $request->input("{$field}_sales_$day") ?? '');
                $dailyUpdate->setAttribute("{$field}_inv", $request->input("{$field}_inv_$day") ?? '');
                $dailyUpdate->setAttribute("{$field}_lines", $request->input("{$field}_lines_$day") ?? '');
            }

            // Update components attributes
            $components = ['mo_total', 'mo_name_one', 'mo_name_two', 'mo_name_three', 'mo_name_four'];
            foreach ($components as $component) {
                $goalKey = "{$component}_goal";
                $salesKey = "{$component}_sales";
                $invKey = "{$component}_inv";
                $linesKey = "{$component}_lines";
                $LPIKey = "{$component}_LPI";
                $dlrInvKey = "{$component}_dlr_inv";

                // Check if the property exists before setting it
                if (property_exists($dailyUpdate, $goalKey)) {
                    $dailyUpdate->setAttribute($goalKey, $request->input("{$goalKey}_$day") ?? '');
                }

                if (property_exists($dailyUpdate, $salesKey)) {
                    $dailyUpdate->setAttribute($salesKey, $request->input("{$salesKey}_$day") ?? '');
                }

                if (property_exists($dailyUpdate, $invKey)) {
                    $dailyUpdate->setAttribute($invKey, $request->input("{$invKey}_$day") ?? '');
                }

                if (property_exists($dailyUpdate, $linesKey)) {
                    $dailyUpdate->setAttribute($linesKey, $request->input("{$linesKey}_$day") ?? '');
                }

                if (property_exists($dailyUpdate, $LPIKey)) {
                    $dailyUpdate->setAttribute($LPIKey, $request->input("{$LPIKey}_$day") ?? '');
                }

                if (property_exists($dailyUpdate, $dlrInvKey)) {
                    $dailyUpdate->setAttribute($dlrInvKey, $request->input("{$dlrInvKey}_$day") ?? '');
                }
            }


            // Update other attributes
            $dailyUpdate->setAttribute("daily_retail", $request->input("daily_retail_$day") ?? '');
            $dailyUpdate->setAttribute("daily_ly1", $request->input("daily_ly1_$day") ?? '');
            $dailyUpdate->setAttribute("daily_cost", $request->input("daily_cost_$day") ?? '');
            $dailyUpdate->setAttribute("daily_margin", $request->input("daily_margin_$day") ?? '');
            $dailyUpdate->setAttribute("daily_sales_goal", $request->input("daily_sales_goal_$day") ?? '');
            $dailyUpdate->setAttribute("daily_ou1", $request->input("daily_ou1_$day") ?? '');
            $dailyUpdate->setAttribute("daily_current", $request->input("daily_current_$day") ?? '');
            $dailyUpdate->setAttribute("daily_ly2", $request->input("daily_ly2_$day") ?? '');
            $dailyUpdate->setAttribute("daily_goal", $request->input("daily_goal_$day") ?? '');
            $dailyUpdate->setAttribute("daily_ou2", $request->input("daily_ou2_$day") ?? '');
            // ... (update other fields)
        }
                
        

        foreach ($dailyUpdate as $key => $value) {
            if (is_array($value)) {
                $dailyUpdate[$key] = json_encode($value);
            }
        }
        
        
        // Debugging: Dump and die the request data
        // dd($request->all());
        // dd($request->all());
        // Save the data to the database
        // DailyUpdate::create($dailyUpdate);
        dd($dailyUpdate);
        try {
            // Save the data to the database
            //$dailyUpdate->save();
        } catch (\Exception $e) {
            // Log or print the exception message for further investigation
            dd($e->getMessage());
        }
        

        return redirect()->back()->with('status', 'Your data saved successfully');
    }

}
