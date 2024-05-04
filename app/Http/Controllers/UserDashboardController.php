<?php

namespace App\Http\Controllers;

use App\Models\CycleCount;
use App\Models\DailyUpdate;
use App\Models\InventoryValuation;
use App\Models\MonthForecast;
use App\Models\OpenBuy;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function records()
    {
        $pages = Page::where('status', '1')->get();
        $monthly_forecasts = MonthForecast::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $cycle_counts = CycleCount::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $open_buys = OpenBuy::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $daily_updates = DailyUpdate::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $inventory_valuations = InventoryValuation::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('records', compact('pages', 'monthly_forecasts', 'cycle_counts', 'open_buys', 'daily_updates', 'inventory_valuations'));
    }

    
}
