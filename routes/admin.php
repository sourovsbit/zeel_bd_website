<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Admin\MenuLabelController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductItemController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductSubCategoryController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SubUnitController;
use App\Http\Controllers\Admin\ProductInformationController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\DivisionSetupController;
use App\Http\Controllers\Admin\DistrictSetupController;
use App\Http\Controllers\Admin\ShippingClassController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ThanaController;
use App\Http\Controllers\Admin\DeliveryChargeController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ReturnRefundPolicyController;
use App\Http\Controllers\Admin\TermsConditionsController;
use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ServiceGuaranteeController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\NewsEventController;
use App\Http\Controllers\Admin\MissionVisionController;
use App\Http\Controllers\Admin\CerficatesController;
use App\Http\Controllers\Admin\AdministrativeController;
use App\Http\Controllers\Admin\ChooseUsController;

Route::get('/',[BackendController::class,'home'])->name('admin.view');
Route::resources([
    'menu_label' => MenuLabelController::class,
    'menu' => MenuController::class,
    'role' => RoleController::class,
    'user' => UserController::class,
    'product_item' => ProductItemController::class,
    'product_category' => ProductCategoryController::class,
    'product_sub_category' => ProductSubCategoryController::class,
    'product_brands' => BrandsController::class,
    'product_size' => ProductSizeController::class,
    'product_color' => ProductColorController::class,
    'unit' => UnitController::class,
    'sub_unit' => SubUnitController::class,
    'product_information' => ProductInformationController::class,
    'vendor' => VendorController::class,
    'division_setup' => DivisionSetupController::class,
    'district_setup' => DistrictSetupController::class,
    'shipping_class' => ShippingClassController::class,
    'supplier_info' => SupplierController::class,
    'thana_setup' => ThanaController::class,
    'delivary_charge' => DeliveryChargeController::class,
    'about_us' => AboutUsController::class,
    'mission_vision' => MissionVisionController::class,
    'company_profile' => CompanyProfileController::class,
    'privacy_policy' => PrivacyPolicyController::class,
    'return_policy' => ReturnRefundPolicyController::class,
    'terms_condition' => TermsConditionsController::class,
    'service_category' => ServiceCategoryController::class,
    'create_service' => ServiceController::class,
    'photo_gallery' => PhotoGalleryController::class,
    'video_gallery' => VideoGalleryController::class,
    'create_employee' => EmployeeController::class,
    'create_clients' => ClientsController::class,
    'create_blogs' => BlogsController::class,
    'newsevents' => NewsEventController::class,
    'create_ads' => AdsController::class,
    'message' => MessageController::class,
    'bookings' => BookingController::class,
    'service_guarantee' => ServiceGuaranteeController::class,
    'create_career' => CareerController::class,
    'reviews' => ReviewController::class,
    'create_certificates' => CerficatesController::class,
    'create_administrative' => AdministrativeController::class,
    'choose_us' => ChooseUsController::class,
]);

// menu_label_extra_routes
Route::post('changeMenuLabelStatus',[MenuLabelController::class,'status'])->name('menu_label.status');
Route::get('menu_label_trash',[MenuLabelController::class,'trash_list'])->name('menu_label.trash_list');
Route::get('restore_menu_label/{id}',[MenuLabelController::class,'restore'])->name('menu_label.restore');
Route::get('delete_menu_label/{id}',[MenuLabelController::class,'delete'])->name('menu_label.delete');

// menu extra routes;
Route::get('get_menu_labels',[MenuController::class,'get_menu_labels'])->name('menu.get_labels');
Route::get('get_parent',[MenuController::class,'get_parent'])->name('menu.get_parent');
Route::get('menu_trash_list',[MenuController::class,'trash_list'])->name('menu.trash_list');
Route::get('menu_restore/{id}',[MenuController::class,'restore'])->name('menu.restore');
Route::get('menu_delete/{id}',[MenuController::class,'delete'])->name('menu.delete');


// role extra routes;
Route::get('/role_trash_list',[RoleController::class,'trash_list'])->name('role.trash_list');
Route::get('/role_restore/{id}',[RoleController::class,'restore'])->name('role.restore');
Route::get('/role_delete/{id}',[RoleController::class,'delete'])->name('role.delete');
Route::get('/role_permission/{id}',[RoleController::class,'permission'])->name('role.permission');
Route::post('/permission_store/{id}',[RoleController::class,'permission_store'])->name('role.permission_store');

//use extra routes;
Route::get('/user_trash_list',[UserController::class,'trash_list'])->name('user.trash_list');
Route::get('restore_user/{id}',[UserController::class,'restore'])->name('user.restore');
Route::get('delete_user/{id}',[UserController::class,'delete'])->name('user.delete');
Route::get('user_profile/{id}',[UserController::class,'profile'])->name('user.profile');
Route::post('user_profile_update/{id}',[UserController::class,'profile_update'])->name('user.profile_update');


//product item extra routes
Route::post('change_menu_status',[ProductItemController::class,'status'])->name('product_item.status');
Route::get('product_item_trash',[ProductItemController::class,'trash'])->name('product_item.trash');
Route::get('restore_product_item/{id}',[ProductItemController::class,'restore'])->name('product_item.restore');
Route::get('delete_product_item/{id}',[ProductItemController::class,'delete'])->name('product_item.delete');


//product category extra routes
Route::post('change_category_status',[ProductCategoryController::class,'status'])->name('product_category.status');
Route::get('product_category_trash',[ProductCategoryController::class,'trash_list'])->name('product_category.trash_list');
Route::get('product_category_restore/{id}',[ProductCategoryController::class,'restore'])->name('product_category.restore');
Route::get('product_category_delete/{id}',[ProductCategoryController::class,'delete'])->name('product_category.delete');


//product sub category extra routes
Route::post('change_sub_category_status',[ProductSubCategoryController::class,'status'])->name('product_sub_category.status');
Route::get('product_sub_category_trash',[ProductSubCategoryController::class,'trash_list'])->name('product_sub_category.trash_list');
Route::get('product_sub_category_restore/{id}',[ProductSubCategoryController::class,'restore'])->name('product_sub_category.restore');
Route::get('product_sub_category_delete/{id}',[ProductSubCategoryController::class,'delete'])->name('product_sub_category.delete');


//product brands extra routes
Route::post('change_brands_status',[BrandsController::class,'status'])->name('product_brands.status');
Route::get('product_brands_trash',[BrandsController::class,'trash'])->name('product_brands.trash');
Route::get('product_brands_restore/{id}',[BrandsController::class,'restore'])->name('product_brands.restore');
Route::get('product_brands_delete/{id}',[BrandsController::class,'delete'])->name('product_brands.delete');


//product size extra routes
Route::post('change_size_status',[ProductSizeController::class,'status'])->name('product_size.status');
Route::get('product_size_trash',[ProductSizeController::class,'trash'])->name('product_size.trash');
Route::get('product_size_restore/{id}',[ProductSizeController::class,'restore'])->name('product_size.restore');
Route::get('product_size_delete/{id}',[ProductSizeController::class,'delete'])->name('product_size.delete');


//product color extra routes
Route::post('change_color_status',[ProductColorController::class,'status'])->name('product_color.status');
Route::get('product_color_trash',[ProductColorController::class,'trash'])->name('product_color.trash');
Route::get('product_color_restore/{id}',[ProductColorController::class,'restore'])->name('product_color.restore');
Route::get('product_color_delete/{id}',[ProductColorController::class,'delete'])->name('product_color.delete');


//product unit extra routes
Route::post('change_unit_status',[UnitController::class,'status'])->name('unit.status');
Route::get('unit_trash',[UnitController::class,'trash'])->name('unit.trash');
Route::get('unit_restore/{id}',[UnitController::class,'restore'])->name('unit.restore');
Route::get('unit_delete/{id}',[UnitController::class,'delete'])->name('unit.delete');


//product sub unit extra routes
Route::post('change_sub_unit_status',[SubUnitController::class,'status'])->name('sub_unit.status');
Route::get('sub_unit_trash',[SubUnitController::class,'trash'])->name('sub_unit.trash');
Route::get('sub_unit_restore/{id}',[SubUnitController::class,'restore'])->name('sub_unit.restore');
Route::get('sub_unit_delete/{id}',[SubUnitController::class,'delete'])->name('sub_unit.delete');


//product product info extra routes
Route::post('change_product_information_status',[ProductInformationController::class,'status'])->name('product_information.status');
Route::get('product_information_trash',[ProductInformationController::class,'trash'])->name('product_information.trash_list');
Route::get('product_information_restore/{id}',[ProductInformationController::class,'restore'])->name('product_information.restore');
Route::get('product_information_delete/{id}',[ProductInformationController::class,'delete'])->name('product_information.delete');


//product vendor extra routes
Route::post('change_vendor_status',[VendorController::class,'status'])->name('vendor.status');
Route::get('vendor_trash',[VendorController::class,'trash'])->name('vendor.trash_list');
Route::get('vendor_restore/{id}',[VendorController::class,'restore'])->name('vendor.restore');
Route::get('vendor_delete/{id}',[VendorController::class,'delete'])->name('vendor.delete');


//product division setup extra routes
Route::post('change_division_setup_status',[DivisionSetupController::class,'status'])->name('division_setup.status');
Route::get('division_setup_trash',[DivisionSetupController::class,'trash'])->name('division_setup.trash_list');
Route::get('division_setup_restore/{id}',[DivisionSetupController::class,'restore'])->name('division_setup.restore');
Route::get('division_setup_delete/{id}',[DivisionSetupController::class,'delete'])->name('division_setup.delete');


//product district setup extra routes
Route::post('change_district_setup_status',[DistrictSetupController::class,'status'])->name('district_setup.status');
Route::get('district_setup_trash',[DistrictSetupController::class,'trash'])->name('district_setup.trash_list');
Route::get('district_setup_restore/{id}',[DistrictSetupController::class,'restore'])->name('district_setup.restore');
Route::get('district_setup_delete/{id}',[DistrictSetupController::class,'delete'])->name('district_setup.delete');


//product shipping class extra routes
Route::post('change_shipping_class_status',[ShippingClassController::class,'status'])->name('shipping_class.status');
Route::get('shipping_class_trash',[ShippingClassController::class,'trash'])->name('shipping_class.trash_list');
Route::get('shipping_class_restore/{id}',[ShippingClassController::class,'restore'])->name('shipping_class.restore');
Route::get('shipping_class_delete/{id}',[ShippingClassController::class,'delete'])->name('shipping_class.delete');


//product thana setup extra routes
Route::post('change_thana_setup_status',[ThanaController::class,'status'])->name('thana_setup.status');
Route::get('thana_setup_trash',[ThanaController::class,'trash'])->name('thana_setup.trash_list');
Route::get('thana_setup_restore/{id}',[ThanaController::class,'restore'])->name('thana_setup.restore');
Route::get('thana_setup_delete/{id}',[ThanaController::class,'delete'])->name('thana_setup.delete');


//product thana setup extra routes
Route::post('change_delivary_charge_status',[DeliveryChargeController::class,'status'])->name('delivary_charge.status');
Route::get('delivary_charge_trash',[DeliveryChargeController::class,'trash'])->name('delivary_charge.trash_list');
Route::get('delivary_charge_restore/{id}',[DeliveryChargeController::class,'restore'])->name('delivary_charge.restore');
Route::get('delivary_charge_delete/{id}',[DeliveryChargeController::class,'delete'])->name('delivary_charge.delete');


//create service extra routes
Route::post('change_service_category_status',[ServiceCategoryController::class,'status'])->name('service_category.status');
Route::get('service_category_trash',[ServiceCategoryController::class,'trash'])->name('service_category.trash_list');
Route::get('service_category_restore/{id}',[ServiceCategoryController::class,'restore'])->name('service_category.restore');
Route::get('service_category_delete/{id}',[ServiceCategoryController::class,'delete'])->name('service_category.delete');


//create service extra routes
Route::post('change_create_service_status',[ServiceController::class,'status'])->name('create_service.status');
Route::get('create_service_trash',[ServiceController::class,'trash'])->name('create_service.trash_list');
Route::get('create_service_restore/{id}',[ServiceController::class,'restore'])->name('create_service.restore');
Route::get('create_service_delete/{id}',[ServiceController::class,'delete'])->name('create_service.delete');


//photo extra routes
Route::post('change_photo_gallery_status',[PhotoGalleryController::class,'status'])->name('photo_gallery.status');
Route::get('photo_gallery_trash',[PhotoGalleryController::class,'trash'])->name('photo_gallery.trash_list');
Route::get('photo_gallery_restore/{id}',[PhotoGalleryController::class,'restore'])->name('photo_gallery.restore');
Route::get('photo_gallery_delete/{id}',[PhotoGalleryController::class,'delete'])->name('photo_gallery.delete');


//create video extra routes
Route::post('change_video_gallery_status',[VideoGalleryController::class,'status'])->name('video_gallery.status');
Route::get('video_gallery_trash',[VideoGalleryController::class,'trash'])->name('video_gallery.trash_list');
Route::get('video_gallery_restore/{id}',[VideoGalleryController::class,'restore'])->name('video_gallery.restore');
Route::get('video_gallery_delete/{id}',[VideoGalleryController::class,'delete'])->name('video_gallery.delete');


//create employee extra routes
Route::post('change_create_employee_status',[EmployeeController::class,'status'])->name('create_employee.status');
Route::get('create_employee_trash',[EmployeeController::class,'trash'])->name('create_employee.trash_list');
Route::get('create_employee_restore/{id}',[EmployeeController::class,'restore'])->name('create_employee.restore');
Route::get('create_employee_delete/{id}',[EmployeeController::class,'delete'])->name('create_employee.delete');


//create clients extra routes
Route::post('change_create_clients_status',[ClientsController::class,'status'])->name('create_clients.status');
Route::get('create_clients_trash',[ClientsController::class,'trash'])->name('create_clients.trash_list');
Route::get('create_clients_restore/{id}',[ClientsController::class,'restore'])->name('create_clients.restore');
Route::get('create_clients_delete/{id}',[ClientsController::class,'delete'])->name('create_clients.delete');


//create blogs extra routes
Route::post('change_create_blogs_status',[BlogsController::class,'status'])->name('create_blogs.status');
Route::get('create_blogs_trash',[BlogsController::class,'trash'])->name('create_blogs.trash_list');
Route::get('create_blogs_restore/{id}',[BlogsController::class,'restore'])->name('create_blogs.restore');
Route::get('create_blogs_delete/{id}',[BlogsController::class,'delete'])->name('create_blogs.delete');


//create newsevents extra routes
Route::post('change_newsevents_status',[NewsEventController::class,'status'])->name('newsevents.status');
Route::get('newsevents_trash',[NewsEventController::class,'trash'])->name('newsevents.trash_list');
Route::get('newsevents_restore/{id}',[NewsEventController::class,'restore'])->name('newsevents.restore');
Route::get('newsevents_delete/{id}',[NewsEventController::class,'delete'])->name('newsevents.delete');


//create certificates extra routes
Route::post('change_create_certificates_status',[CerficatesController::class,'status'])->name('create_certificates.status');
Route::get('create_certificates_trash',[CerficatesController::class,'trash'])->name('create_certificates.trash_list');
Route::get('create_certificates_restore/{id}',[CerficatesController::class,'restore'])->name('create_certificates.restore');
Route::get('create_certificates_delete/{id}',[CerficatesController::class,'delete'])->name('create_certificates.delete');

//create ads extra routes
Route::post('change_create_ads_status',[AdsController::class,'status'])->name('create_ads.status');
Route::get('create_ads_trash',[AdsController::class,'trash'])->name('create_ads.trash_list');
Route::get('create_ads_restore/{id}',[AdsController::class,'restore'])->name('create_ads.restore');
Route::get('create_ads_delete/{id}',[AdsController::class,'delete'])->name('create_ads.delete');

//create administrative extra routes
Route::post('change_create_administrative_status',[AdministrativeController::class,'status'])->name('create_administrative.status');
Route::get('create_administrative_trash',[AdministrativeController::class,'trash'])->name('create_administrative.trash_list');
Route::get('create_administrative_restore/{id}',[AdministrativeController::class,'restore'])->name('create_administrative.restore');
Route::get('create_administrative_delete/{id}',[AdministrativeController::class,'delete'])->name('create_administrative.delete');

//create career extra routes
Route::post('change_create_career_status',[CareerController::class,'status'])->name('create_career.status');
Route::get('create_career_trash',[CareerController::class,'trash'])->name('create_career.trash_list');
Route::get('create_career_restore/{id}',[CareerController::class,'restore'])->name('create_career.restore');
Route::get('create_career_delete/{id}',[CareerController::class,'delete'])->name('create_career.delete');
Route::get('bookings_delete/{id}',[BookingController::class,'delete'])->name('bookings.delete');

//create why choose us extra routes
Route::post('change_choose_us_status',[ChooseUsController::class,'status'])->name('choose_us.status');
Route::get('choose_us_trash',[ChooseUsController::class,'trash'])->name('choose_us.trash_list');
Route::get('choose_us_restore/{id}',[ChooseUsController::class,'restore'])->name('choose_us.restore');
Route::get('choose_us_delete/{id}',[ChooseUsController::class,'delete'])->name('choose_us.delete');

//create message extra routes
Route::post('change_message_status',[MessageController::class,'status'])->name('message.status');

//create bookings extra routes
Route::post('change_bookings_status',[BookingController::class,'status'])->name('bookings.status');

//create career extra routes
Route::post('change_reviews_status',[ReviewController::class,'status'])->name('reviews.status');
