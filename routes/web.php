<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreManager;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\ProductItemController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ProductInformationController;
use App\Http\Controllers\Admin\ProductSubCategoryController;
use App\Http\Controllers\Admin\DistrictSetupController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\MenuController;
// frontend
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('error_solve',[AjaxController::class,'error_solve']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('stores/{id}',[StoreManager::class,'stores']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// product extra routes
Route::get('find_cat/{item_id}',[AjaxController::class,'find_cat']);
Route::get('getProductVariation/{type}',[AjaxController::class,'getProductVariation']);
Route::post('filterProduct',[AjaxController::class,'filterProduct']);
Route::post('TrashedfilterProduct',[AjaxController::class,'TrashedfilterProduct']);
Route::post('findArea',[AjaxController::class,'findArea']);
Route::get('getAreaName/{id}',[AjaxController::class,'getAreaName']);
Route::post('filterSupplier',[AjaxController::class,'filterSupplier']);

Route::get('/paypal_pay',[PaypalController::class,'paypal_pay']);
Route::post('pay_with_paypal',[PaypalController::class,'pay_with_paypal'])->name('pay_with_paypal');
Route::get('success',[PaypalController::class,'success'])->name('success');
Route::get('cancel',[PaypalController::class,'cancel'])->name('cancel');
Route::get('GetDivision/{division_id}',[DistrictSetupController::class,'GetDivision']);
Route::get('GetDistrict/{district_id}',[ThanaController::class,'GetDistrict']);

Route::get('GetCategorie/{category_id}',[ProductSubCategoryController::class,'GetCategorie']);
Route::get('GetSubCategorie/{category_id}',[ProductInformationController::class,'GetSubCategorie']);

Route::post('change_menu_status',[MenuController::class,'status'])->name('menu.status');

Route::post('searchProduct',[AjaxController::class,'searchProduct']);
Route::post('disableAds',[AjaxController::class,'disableAds'])->name('frontend.disable_ads');

require __DIR__.'/auth.php';

// frontend
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('about', 'about');
    Route::get('missionvision', 'missionvision');
    Route::get('blogs', 'blogs');
    Route::get('blog_details/{id}', 'blog_details');
    Route::get('service_area/{id}', 'service_area');
    Route::get('service_detail/{id}', 'service_detail');
    Route::get('careers', 'careers');
    Route::get('career_detail/{id}', 'career_details');
    Route::get('newsevent', 'newsevent');
    Route::get('newsevents_details/{id}', 'newsevents_details');
    Route::get('cerficate', 'cerficate');
    Route::get('certificate', 'cerficate');
    Route::get('gallery', 'gallery');
    Route::get('videoalbum', 'videoalbum');
    Route::get('privacy_policy', 'privacy_policy');
    Route::get('ads_details/{id}', 'ads_details');
    Route::get('privacypolicy', 'privacypolicy');
    Route::get('termsconditions', 'termsconditions');
    Route::get('returnrefund', 'returnrefund');
    Route::get('serviceguarantee', 'serviceguarantee');
    Route::get('shop', 'shop');
    Route::get('item_products/{id}', 'item_products');
    Route::get('brand_products/{id}', 'brand_products');
    Route::get('category_products/{id}', 'category_products');
    Route::get('all_categories', 'all_categories');
    Route::get('team', 'team');
    Route::get('sell_page/{id}', 'sell_page');
    Route::post('BookService/{id}', 'BookService');
    Route::post('sendReview/{id}', 'sendReview');
    Route::get('contact', 'contact');
    Route::post('sendMessage', 'sendMessage');
    Route::get('categorie_product/{id}', 'categorie_product');
    Route::get('administrative_message/{id}', 'administrative_message');
    Route::get('certificates', 'certificates');
});

