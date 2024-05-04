<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Stripe\Plan as StripePlan;
use Illuminate\Validation\Rule;

class PlanControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewPlans(){
        $plans = Plan::all();
        return view('admin.plan.view-plans', compact('plans'));
    }

    public function savePlan(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // $this->validate($request, [
        //     'name' => 'required',
        //     'price' => 'required|numeric|min:0',
        //     'description' => 'required',
        //     'billing_period' => ['required', Rule::in(['week', 'month', 'year'])], // Adjust as needed
        //     'interval_count' => 'required|integer|min:1',
        //     'currency' => 'required',
        // ]);

        try {
            $price = $request->input('price') * 100; // Convert to cents
            $plan = StripePlan::create([
                'amount' => $price,
                'currency' => 'usd',
                'interval' => $request->input('billing_period'),
                'product' => [
                    'name' => $request->input('name'),
                ],
            ]);

            // Uncomment if needed, after ensuring $plan details are correct
            $modelPlan = Plan::create([
                'stripe_plan' => $plan->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $plan->amount,
                'currency' => $plan->currency,
                'billing_period' => $plan->interval,
                // 'interval_count' => $request->input('interval_count'),
                'slug' => Str::slug($request->input('name')),
            ]);
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Failed to save the plan. ' . $ex->getMessage());
        }

        return redirect()->back()->with('status', 'Your plan has been saved');
    }


    public function editPlan($id){
        $plan = Plan::Find($id);
        return view('admin.plan.edit-plan', compact('plan'));
    }

    public function updatePlan(Request $request, $planId)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // Validate your input if necessary

        try {
            $price = $request->input('price') * 100; // Convert to cents

            $plan = StripePlan::update(
                $planId, 
                [
                    'amount' => $price,
                    'product' => [
                        'name' => $request->input('name'),
                    ],
                ]
            );

            // Uncomment if needed, after ensuring $plan details are correct
            $modelPlan = Plan::where('stripe_plan', $plan->id)->first();
            if ($modelPlan) {
                $modelPlan->update([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                    'price' => $plan->amount,
                    // Update other fields as needed
                ]);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', 'Failed to update the plan. ' . $ex->getMessage());
        }

        return redirect()->back()->with('status', 'Your plan has been updated');
    }


    public function deletePlan($id){
        $plan = Plan::Find($id);
        $plan->delete();
        return redirect('/admin/view-plans')->with('status', 'Your plan item has been deleted');
    }

    // public function activePlan($id)
    // {
    //     $plan = Plan::find($id);
    //     $plan->status = '1';
    //     $plan->update();
    //     return redirect()->back()->with('status', 'Plan Activated');
    // }

    // public function deactivePlan($id)
    // {
    //     $plan = Plan::find($id);
    //     $plan->status = '0';
    //     $plan->update();
    //     return redirect()->back()->with('warning', 'Plan De-activated');
    // }
}
