<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageControlController;
use App\Http\Controllers\Admin\PlanControlController;
use App\Http\Controllers\Admin\SliderControlController;
use App\Http\Controllers\Admin\TemplateControlController;
use App\Http\Controllers\Admin\TextControlController;
use App\Http\Controllers\Admin\UserControlController;
use App\Http\Controllers\Admin\WebContentControlController;
use App\Http\Controllers\CycleCountController;
use App\Http\Controllers\DailyUpdateController;
use App\Http\Controllers\StripeSubscriptionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryValuationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OpenToBuyController;
use App\Http\Controllers\TrackingTwelveController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[HomeController::class, 'welcome']);
Route::get('/contact',[HomeController::class, 'contact']);


Route::get('/page/{slug}', [HomeController::class, 'pageDetails'])->name('page.details');
Route::post('/send-email', [MailController::class, 'contactMail'])->name('contact.send');


// Auth::routes(['login' => false, 'register' => false]);
// Route::get('admin-do-create', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
// Route::post('admin-do-create', 'App\Http\Controllers\Auth\RegisterController@register')->name('register');

// Route::get('admin-do-login', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
// Route::post('admin-do-login', 'App\Http\Controllers\Auth\LoginController@login')->name('login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth','verified']], function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/records', [UserDashboardController::class, 'records'])->name('records');
    
    //Tracking Twelve Routes
    Route::get('/tracking-twelve', [TrackingTwelveController::class, 'tracking_twelve'])->name('tracking.twelve');
    Route::post('/save-tracking-twelve', [TrackingTwelveController::class, 'save_tracking_twelve'])->name('save.tracking.twelve');
    Route::get('/tracking-twelve-details/{id}', [TrackingTwelveController::class, 'tracking_twelve_details'])->name('tracking.twelve.details');
    Route::get('/edit-tracking-twelve/{id}', [TrackingTwelveController::class, 'edit_tracking_twelve'])->name('edit.tracking.twelve');
    Route::post('/update-tracking-twelve/{id}', [TrackingTwelveController::class, 'update_tracking_twelve'])->name('update.tracking.twelve');
    Route::post('/view-pdf-tracking-twelve/{id}', [TrackingTwelveController::class, 'view_pdf_tracking_twelve'])->name('view.pdf.tracking.twelve');

    //Open to Buy Routes
    Route::get('/open-buy', [OpenToBuyController::class, 'index'])->name('open.buy');
    Route::post('/save-open-buy', [OpenToBuyController::class, 'save_open_buy'])->name('save.open.buy');
    Route::get('/open-buy-details/{id}', [OpenToBuyController::class, 'open_buy_details'])->name('open.buy.details');
    Route::get('/edit-open-buy/{id}', [OpenToBuyController::class, 'edit_open_buy'])->name('edit.open.buy');
    Route::post('/update-open-buy/{id}', [OpenToBuyController::class, 'update_open_buy'])->name('update.open.buy');
    Route::post('/view-pdf-open-buy/{id}', [OpenToBuyController::class, 'view_pdf_open_buy'])->name('view.pdf.open.buy');

    //Cycle count Routes
    Route::get('/cycle-count', [CycleCountController::class, 'index'])->name('cycle.count');
    Route::post('/save-cycle-count', [CycleCountController::class, 'save_cycle_count'])->name('save.cycle.count');
    Route::get('/cycle-count-details/{id}', [CycleCountController::class, 'cycle_count_details'])->name('cycle.count.details');
    Route::get('/edit-cycle-count/{id}', [CycleCountController::class, 'edit_cycle_count'])->name('edit.cycle.count');
    Route::post('/update-cycle-count/{id}', [CycleCountController::class, 'update_cycle_count'])->name('update.cycle.count');
    Route::post('/view-pdf-cycle-count/{id}', [CycleCountController::class, 'view_pdf_cycle_count'])->name('view.pdf.cycle.count');

    //Daily Update Routes
    Route::get('/daily-update', [DailyUpdateController::class, 'index'])->name('daily.update');
    Route::post('/save-daily-update', [DailyUpdateController::class, 'save_daily_update'])->name('save.daily.update');
    Route::get('/daily-update-details/{id}', [DailyUpdateController::class, 'daily_update_details'])->name('daily.update.details');
    Route::get('/edit-daily-update/{id}', [DailyUpdateController::class, 'edit_daily_update'])->name('edit.daily.update');
    Route::post('/update-daily-update/{id}', [DailyUpdateController::class, 'update_daily_update'])->name('update.daily.update');
    Route::post('/view-pdf-daily-update/{id}', [DailyUpdateController::class, 'view_pdf_daily_update'])->name('view.pdf.daily.update');

    //Inventory Valuation Routes
    Route::get('/inventory-valuation', [InventoryValuationController::class, 'inventory_valuation'])->name('inventory.valuation');
    Route::post('/save-inventory-valuation', [InventoryValuationController::class, 'save_inventory_valuation'])->name('save.inventory.valuation');
    Route::get('/inventory-valuation-details/{id}', [InventoryValuationController::class, 'inventory_valuation_details'])->name('inventory.valuation.details');
    Route::get('/edit-inventory-valuation/{id}', [InventoryValuationController::class, 'edit_inventory_valuation'])->name('edit.inventory.valuation');
    Route::post('/update-inventory-valuation/{id}', [InventoryValuationController::class, 'update_inventory_valuation'])->name('update.inventory.valuation');
    Route::post('/view-pdf-inventory-valuation/{id}', [InventoryValuationController::class, 'view_pdf_inventory_valuation'])->name('view.pdf.inventory.valuation');

    Route::get('/plans', [StripeSubscriptionController::class, 'index']);
    Route::get('plans/{plan}', [StripeSubscriptionController::class, 'show'])->name("plans.show");
    Route::get('subscription/cancel', [StripeSubscriptionController::class, 'cancelSubscription'])->name("subscription.cancel");
    Route::post('subscription', [StripeSubscriptionController::class, 'subscription'])->name("subscription.create");


    
});

Route::group(['middleware' => ['auth','is_admin']], function () {

    Route::get('/admin/dashboard',[AdminController::class, 'adminIndex'])->name('admin.dashboard');
    Route::post('/admin/update-color/{id}',[AdminController::class, 'updateColor'])->name('update.color');

    //======================= Slider Routes =======================//
    Route::get('/admin/view-sliders',[SliderControlController::class, 'viewSliders'])->name('admin.sliders');
    Route::post('/admin/add-slider',[SliderControlController::class, 'saveSlider'])->name('save.slider');
    Route::get('/admin/edit-slider/{id}',[SliderControlController::class, 'editSlider'])->name('edit.slider');
    Route::post('/admin/update-slider/{id}',[SliderControlController::class, 'updateSlider'])->name('update.slider');
    Route::get('/admin/delete-slider/{id}',[SliderControlController::class, 'deleteSlider'])->name('delete.slider');
    Route::get('/admin/make-slider-active/{id}', [SliderControlController::class, 'activeSlider'])->name('active.slider');
    Route::get('/admin/make-slider-deactive/{id}', [SliderControlController::class, 'deactiveSlider'])->name('deactive.slider');

    //======================= Page Routes =======================//
    Route::get('/admin/view-pages',[PageControlController::class, 'viewPages'])->name('admin.pages');
    Route::post('/admin/add-page',[PageControlController::class, 'savePage'])->name('save.page');
    Route::get('/admin/edit-page/{id}',[PageControlController::class, 'editPage'])->name('edit.page');
    Route::post('/admin/update-page/{id}',[PageControlController::class, 'updatePage'])->name('update.page');
    Route::get('/admin/delete-page/{id}',[PageControlController::class, 'deletePage'])->name('delete.page');
    Route::get('/admin/make-page-active/{id}', [PageControlController::class, 'activePage'])->name('active.page');
    Route::get('/admin/make-page-deactive/{id}', [PageControlController::class, 'deactivePage'])->name('deactive.page');
    
    //======================= Template Routes =======================//
    Route::get('/admin/view-templates',[TemplateControlController::class, 'viewTemplates'])->name('admin.templates');
    Route::post('/admin/add-template',[TemplateControlController::class, 'saveTemplate'])->name('save.template');
    Route::get('/admin/edit-template/{id}',[TemplateControlController::class, 'editTemplate'])->name('edit.template');
    Route::post('/admin/update-template/{id}',[TemplateControlController::class, 'updateTemplate'])->name('update.template');
    Route::get('/admin/delete-template/{id}',[TemplateControlController::class, 'deleteTemplate'])->name('delete.template');
    Route::get('/admin/make-template-active/{id}', [TemplateControlController::class, 'activeTemplate'])->name('active.template');
    Route::get('/admin/make-template-deactive/{id}', [TemplateControlController::class, 'deactiveTemplate'])->name('deactive.template');

    //================= Web Content Routes ==================//
    Route::get('/admin/view-web-contents',[WebContentControlController::class, 'viewWebContents'])->name('admin.web.contents');
    Route::post('/admin/add-web-content',[WebContentControlController::class, 'saveWebContent'])->name('save.web.content');
    Route::get('/admin/edit-web-content/{id}',[WebContentControlController::class, 'editWebContent'])->name('edit.web.content');
    Route::post('/admin/update-web-content/{id}',[WebContentControlController::class, 'updateWebContent'])->name('update.web.content');
    Route::get('/admin/make-web-content-active/{id}', [WebContentControlController::class, 'activeWebContent'])->name('active.web.content');
    Route::get('/admin/make-web-content-deactive/{id}', [WebContentControlController::class, 'deactiveWebContent'])->name('deactive.web.content');

    //======================= Plan Routes =======================//
    Route::get('/admin/view-plans',[PlanControlController::class, 'viewPlans'])->name('admin.plans');
    Route::post('/admin/add-plan',[PlanControlController::class, 'savePlan'])->name('save.plan');
    Route::get('/admin/edit-plan/{id}',[PlanControlController::class, 'editPlan'])->name('edit.plan');
    Route::post('/admin/update-plan/{id}',[PlanControlController::class, 'updatePlan'])->name('update.plan');
    Route::get('/admin/delete-plan/{id}',[PlanControlController::class, 'deletePlan'])->name('delete.plan');
    Route::get('/admin/make-plan-active/{id}', [PlanControlController::class, 'activePlan'])->name('active.plan');
    Route::get('/admin/make-plan-deactive/{id}', [PlanControlController::class, 'deactivePlan'])->name('deactive.plan');

    //======================= Text Routes =======================//
    Route::get('/admin/view-texts',[TextControlController::class, 'viewTexts'])->name('admin.texts');
    Route::post('/admin/add-text',[TextControlController::class, 'saveText'])->name('save.text');
    Route::get('/admin/edit-text/{id}',[TextControlController::class, 'editText'])->name('edit.text');
    Route::post('/admin/update-text/{id}',[TextControlController::class, 'updateText'])->name('update.text');
    Route::get('/admin/delete-text/{id}',[TextControlController::class, 'deleteText'])->name('delete.text');
    Route::get('/admin/make-text-active/{id}', [TextControlController::class, 'activeText'])->name('active.text');
    Route::get('/admin/make-text-deactive/{id}', [TextControlController::class, 'deactiveText'])->name('deactive.text');

    //======================= User Routes =======================//
    Route::get('/admin/view-users',[UserControlController::class, 'viewUsers'])->name('admin.users');
    Route::get('/admin/make-user-active/{id}', [UserControlController::class, 'activeUser'])->name('active.user');
    Route::get('/admin/make-user-deactive/{id}', [UserControlController::class, 'deactiveUser'])->name('deactive.user');
    Route::get('/admin/reset-user-password/{id}', [UserControlController::class, 'resetPassword'])->name('reset.user.password');

 });

//  Route::get('/license',[HomeController::class, 'license']);

// Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.dashboard')->middleware('is_admin');
//verifying email
Route::get('/email/verify', function () {
    return view('auth.verify');
 })->middleware('auth')->name('verification.notice');
 
 //sending verification email
 Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
 })->middleware(['auth', 'signed'])->name('verification.verify');
 
 //re-sending verification email
 Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
 })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
 