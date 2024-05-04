<?php

namespace App\Http\Controllers;

use App\Models\MonthForecast;
use App\Models\Page;
use App\Models\Template;
use App\Models\Text;
use App\Models\ThemeInfo;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Subscription;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $pages = Page::where('status', '1')->get();
        $hero_text = WebContent::where('id', '1')->first();
        $about_text = WebContent::where('id', '2')->first();
        $open_text = WebContent::where('id', '3')->first();
        $forecast_text = WebContent::where('id', '4')->first();
        $cycle_count_text = WebContent::where('id', '5')->first();
        $track_daily_text = WebContent::where('id', '6')->first();
        $email_text = Text::where('id', '1')->first();
        $facebook_link = Text::where('id', '2')->first();
        $insta_link = Text::where('id', '3')->first();
        $twitter_link = Text::where('id', '4')->first();
        $kpi_first_text = Text::where('id', '5')->first();
        $kpi_sec_text = Text::where('id', '6')->first();
        $color = ThemeInfo::Find('1');
        $templates = Template::where('status', 1)->get();
        return view('welcome', compact('pages', 'color', 'templates', 'hero_text', 'about_text', 'open_text', 'forecast_text', 'cycle_count_text', 'track_daily_text', 'email_text', 'facebook_link', 'insta_link', 'twitter_link', 'kpi_first_text', 'kpi_sec_text'));
    }
    
    public function contact()
    {
        $pages = Page::where('status', '1')->get();
        $hero_text = WebContent::where('id', '1')->first();
        $about_text = WebContent::where('id', '2')->first();
        $open_text = WebContent::where('id', '3')->first();
        $forecast_text = WebContent::where('id', '4')->first();
        $cycle_count_text = WebContent::where('id', '5')->first();
        $track_daily_text = WebContent::where('id', '6')->first();
        $email_text = Text::where('id', '1')->first();
        $facebook_link = Text::where('id', '2')->first();
        $insta_link = Text::where('id', '3')->first();
        $twitter_link = Text::where('id', '4')->first();
        $kpi_first_text = Text::where('id', '5')->first();
        $kpi_sec_text = Text::where('id', '6')->first();
        $color = ThemeInfo::Find('1');
        $templates = Template::where('status', 1)->get();
        return view('contact', compact('pages', 'color', 'templates', 'hero_text', 'about_text', 'open_text', 'forecast_text', 'cycle_count_text', 'track_daily_text', 'email_text', 'facebook_link', 'insta_link', 'twitter_link', 'kpi_first_text', 'kpi_sec_text'));
    }
    
    public function pageDetails($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $pages = Page::where('status', '1')->get();
        $hero_text = WebContent::where('id', '1')->first();
        $about_text = WebContent::where('id', '2')->first();
        $open_text = WebContent::where('id', '3')->first();
        $forecast_text = WebContent::where('id', '4')->first();
        $cycle_count_text = WebContent::where('id', '5')->first();
        $track_daily_text = WebContent::where('id', '6')->first();
        $email_text = Text::where('id', '1')->first();
        $facebook_link = Text::where('id', '2')->first();
        $insta_link = Text::where('id', '3')->first();
        $twitter_link = Text::where('id', '4')->first();
        $kpi_first_text = Text::where('id', '5')->first();
        $kpi_sec_text = Text::where('id', '6')->first();
        $color = ThemeInfo::Find('1');
        return view('page-details', compact('page', 'color', 'pages', 'hero_text', 'about_text', 'open_text', 'forecast_text', 'cycle_count_text', 'track_daily_text', 'email_text', 'facebook_link', 'insta_link', 'twitter_link', 'kpi_first_text', 'kpi_sec_text'));
    }
    
    public function index()
    {
        $pages = Page::where('status', '1')->get();
        $templates = Template::where('status', '1')->get();
        $color = ThemeInfo::Find('1');
        // Retrieve the last subscription
        $subscription = Subscription::where('user_id', Auth::user()->id)
        ->whereNull('ends_at')    
        ->latest()
        ->first();

        $subscribed = Subscription::where('user_id', Auth::user()->id)->exists();
        $notSubscribed = Subscription::where('user_id', Auth::user()->id)->get();

        return view('home', compact('pages', 'color', 'templates', 'subscription', 'subscribed', 'notSubscribed'));
    }



    

}
