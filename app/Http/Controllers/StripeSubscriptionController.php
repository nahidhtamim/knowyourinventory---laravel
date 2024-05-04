<?php

namespace App\Http\Controllers;

use App\Mail\SubscriptionSuccessMail;
use App\Models\Page;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StripeSubscriptionController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        $pages = Page::where('status', '1')->get();
        return view("plans", compact("plans", 'pages'));
    }  

    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        $pages = Page::where('status', '1')->get();
        return view("subscription", compact("plan", "intent", 'pages'));
    }

    // public function subscription(Request $request)
    // {
    //     $pages = Page::where('status', '1')->get();
    //     $plan = Plan::find($request->plan);
    //     $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);
    //     return view("subscription_success", compact("plan", "pages", "subscription"));
    // }
    public function subscription(Request $request)
    {
        $pages = Page::where('status', '1')->get();
        $plan = Plan::find($request->plan);
        
        // Create subscription
        $subscription = $request->user()->newSubscription($request->plan, $plan->stripe_plan)->create($request->token);

        // Send success email to the customer
        $user = $request->user();
        $data = [
            'user' => $user,
            'plan' => $plan,
            'subscription' => $subscription,
            // Add any additional data you want to pass to the email view
        ];

        // Mail::to($user->email)->send(new SubscriptionSuccessMail($data));

        return view("subscription_success", compact("plan", "pages", "subscription"));
    }

    public function cancelSubscription(Request $request){

        $subscriptionName = $request->subscriptionName;

        if($subscriptionName){
            $user = Auth::user();
            $user->subscription($subscriptionName)->cancel();
        }

        return redirect()->back()->with('warning', 'Subscription Cancelled');
    }
}
