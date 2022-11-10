<?php

use App\Http\Controllers\AgroDetailsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DairyDetailsController;
use App\Http\Controllers\ExpanseController;
use App\Http\Controllers\ExpanseDetailsController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\VaccineName;
use App\Http\Controllers\VaccineNameController;
use App\Http\Controllers\WhatsappController;
use App\Models\AgroDetails;
use App\Models\Inquiry;
use App\Models\ProductDetails;
use App\Models\Register;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/',[HomeController::class, 'HomeView'])->name('/');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Contact Us
Route::get('/contact', [ContactController::class, 'contactShow'])->name('contact');
Route::post('/contact/store', [ContactController::class, 'storeContact'])->name('contact.store');

### Backend Admin
Route::get('/contact/all', [ContactController::class, 'contactAll'])->name('contact.all');
Route::get('/contact/delete/{id}', [ContactController::class, 'contactDelete'])->name('contact.delete');

// Inquiry Form
Route::post('/inquiry/store', [InquiryController::class, 'storeInquiry'])->name('inquiry.store');

## Backend Admin -
Route::get('/inquiry/all', [InquiryController::class, 'inquiryAll'])->name('inquiry.all');
Route::get('/inquiry/delete/{id}', [InquiryController::class, 'inquiryDelete'])->name('inquiry.delete');

// Registration/Login Form
Route::get('/registration', [RegisterController::class, 'registerShow'])->name('registration');
Route::post('/register/store', [RegisterController::class, 'storeRegister'])->name('register.store');
Route::post('/register/update', [RegisterController::class, 'updateRegister'])->name('register.update');
Route::post('/password/update', [RegisterController::class, 'updatePassword'])->name('password.update');

Route::post('/customer/login',[RegisterController::class, 'userLogin'])->name('customer.login');
Route::get('/customer/logout',[RegisterController::class, 'userlogout'])->name('customer.logout');

// Cart Form
Route::get('/cart', [CartController::class, 'cartAll'])->name('cart');
Route::get('/cart/save/{id}', [CartController::class, 'cartSave'])->name('cart.save');
Route::get('/cart/delete/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');

Route::post('/cart/store', [CartController::class, 'cartStore'])->name('cart.store');

// Order Form
Route::get('/order', [OrderController::class, 'All'])->name('order');
Route::get('/order/details', [OrderController::class, 'orderDetails'])->name('order.details');

Route::get('/cart/save/{id}', [CartController::class, 'cartSave'])->name('cart.save');
Route::get('/cart/delete/{id}', [CartController::class, 'cartDelete'])->name('cart.delete');

Route::get('/order/all', [OrderController::class, 'orderDetailsAll'])->name('order.all');


Route::post('/order/store', [OrderController::class, 'orderStore'])->name('order.store');




// BACKEND
#########################################################################################################################
#########################################################################################################################

// whatsapp Controller
Route::get('/whatsapp/all', [WhatsappController::class, 'AllCat'])->name('whatsapp.all');
Route::get('/whatsapp/delete/{id}', [WhatsappController::class, 'DeleteCat'])->name('whatsapp.delete');

Route::post('/whatsapp/store', [WhatsappController::class, 'StoreCat'])->name('whatsapp.store');



// Category Controller
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('category.all');
Route::get('/category/edit/{id}', [CategoryController::class, 'EditCat'])->name('category.edit');
Route::get('/category/delete/{id}', [CategoryController::class, 'DeleteCat'])->name('category.delete');


###########################?????????????????????????????????????????????????????????????????????????????????????????????
Route::get('/category/view/{id}', [CategoryController::class, 'ViewCat'])->name('category.view');
###########################?????????????????????????????????????????????????????????????????????????????????????????????


Route::post('/category/store', [CategoryController::class, 'StoreCat'])->name('category.store');
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCat'])->name('category.update');


// SubCategory Controller
Route::get('/subcategory/all', [SubCategoryController::class, 'AllSubCat'])->name('subcategory.all');
Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'EditSubCat'])->name('subcategory.edit');
Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'DeleteSubCat'])->name('subcategory.delete');

Route::post('/subcategory/store', [SubCategoryController::class, 'StoreSubCat'])->name('subcategory.store');
Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'UpdateSubCat'])->name('subcategory.update');


// Brand Controller
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('brand.all');
Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand'])->name('brand.edit');
Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand'])->name('brand.delete');

Route::post('/brand/store', [BrandController::class, 'StoreBrand'])->name('brand.store');
Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand'])->name('brand.update');


// Product Controller
Route::get('/product/all', [ProductDetailsController::class, 'AllProduct'])->name('product.all');
Route::get('/product/add', [ProductDetailsController::class, 'AllAdd'])->name('product.add');
Route::get('/product/edit/{id}', [ProductDetailsController::class, 'EditProduct'])->name('product.edit');
Route::get('/product/delete/{id}', [ProductDetailsController::class, 'DeleteProduct'])->name('product.delete');
Route::get('/product/reminder', [ProductDetailsController::class, 'productReminder'])->name('product.reminder');

Route::post('/product/store', [ProductDetailsController::class, 'StoreProduct'])->name('product.store');
Route::post('/product/update/{id}', [ProductDetailsController::class, 'UpdateProduct'])->name('product.update');
Route::post('/product/reminder', [ProductDetailsController::class, 'productReminderUpdate'])->name('product.reminder.update');


## Frontend Product
Route::get('/dairyProduct', [ProductDetailsController::class, 'ProductAll'])->name('dairyProduct');
Route::get('/dairyProduct/details/{id}', [ProductDetailsController::class, 'ProductDetails'])->name('product.details');


// Agro Controller
Route::get('/agro/all', [AgroDetailsController::class, 'AllAgro'])->name('agro.all');
Route::get('/agro/add', [AgroDetailsController::class, 'AllAdd'])->name('agro.add');
Route::get('/agro/edit/{id}', [AgroDetailsController::class, 'EditAgro'])->name('agro.edit');
Route::get('/agro/delete/{id}', [AgroDetailsController::class, 'DeleteAgro'])->name('agro.delete');

Route::post('/agro/store', [AgroDetailsController::class, 'StoreAgro'])->name('agro.store');
Route::post('/agro/update/{id}', [AgroDetailsController::class, 'UpdateAgro'])->name('agro.update');

### Frontend Agro Controller
Route::get('/agro', [AgroDetailsController::class, 'AgroAll'])->name('agro');
Route::get('/agro/details/{id}', [AgroDetailsController::class, 'AgroDetails'])->name('agro.details');


// Dairy Controller
Route::get('/dairy/all', [DairyDetailsController::class, 'AllDairy'])->name('dairy.all');
Route::get('/dairy/add', [DairyDetailsController::class, 'AllAdd'])->name('dairy.add');
Route::get('/dairy/edit/{id}', [DairyDetailsController::class, 'EditDairy'])->name('dairy.edit');
Route::get('/dairy/delete/{id}', [DairyDetailsController::class, 'DeleteDairy'])->name('dairy.delete');

Route::post('/dairy/store', [DairyDetailsController::class, 'StoreDairy'])->name('dairy.store');
Route::post('/dairy/update/{id}', [DairyDetailsController::class, 'UpdateDairy'])->name('dairy.update');

## Frontend Dairy
Route::get('/dairy', [DairyDetailsController::class, 'DairyAll'])->name('dairy');
Route::get('/dairy/details/{id}', [DairyDetailsController::class, 'DairyDetails'])->name('dairy.details');


// Production Controller
Route::get('/production/all', [ProductionController::class, 'AllProduction'])->name('production.all');
Route::get('/production/add', [ProductionController::class, 'AllAdd'])->name('production.add');
Route::get('/production/edit/{id}', [ProductionController::class, 'EditProduction'])->name('production.edit');
Route::get('/production/delete/{id}', [ProductionController::class, 'DeleteProduction'])->name('production.delete');

Route::post('/production/store', [ProductionController::class, 'StoreProduction'])->name('production.store');
Route::post('/production/update/{id}', [ProductionController::class, 'UpdateProduction'])->name('production.update');

// Vaccine Controller
Route::get('/vaccine/all', [VaccineController::class, 'AllVaccine'])->name('vaccine.all');
Route::get('/vaccine/reminder', [VaccineController::class, 'ReminderVaccine'])->name('vaccine.reminder');
Route::get('/vaccine/edit/{id}', [VaccineController::class, 'EditVaccine'])->name('vaccine.edit');
Route::get('/vaccine/delete/{id}', [VaccineController::class, 'DeleteVaccine'])->name('vaccine.delete');
Route::get('/vaccine/reminder/update/{id}', [VaccineController::class, 'UpdateVaccineReminder'])->name('vaccineReminder.update');

Route::post('/vaccine/store', [VaccineController::class, 'StoreVaccine'])->name('vaccine.store');
Route::post('/vaccine/update/{id}', [VaccineController::class, 'UpdateVaccine'])->name('vaccine.update');


// Vaccine Name Controller
Route::get('/vaccineName/all', [VaccineNameController::class, 'AllVaccineName'])->name('vaccineName.all');
Route::get('/vaccineName/edit/{id}', [VaccineNameController::class, 'EditVaccineName'])->name('vaccineName.edit');
Route::get('/vaccineName/delete/{id}', [VaccineNameController::class, 'DeleteVaccineName'])->name('vaccineName.delete');

Route::post('/vaccineName/store', [VaccineNameController::class, 'StoreVaccineName'])->name('vaccineName.store');
Route::post('/vaccineName/update/{id}', [VaccineNameController::class, 'UpdateVaccineName'])->name('vaccineName.update');

// Food Name Controller
Route::get('/foodName/all', [FoodController::class, 'AllFoodName'])->name('food.all');
Route::get('/foodName/edit/{id}', [FoodController::class, 'EditFoodName'])->name('food.edit');
Route::get('/foodName/delete/{id}', [FoodController::class, 'DeleteFoodName'])->name('food.delete');

Route::post('/foodName/store', [FoodController::class, 'StoreFoodName'])->name('food.store');
Route::post('/foodName/update/{id}', [FoodController::class, 'UpdateFoodName'])->name('food.update');

// Expanse Type Controller
Route::get('/expanse/all', [ExpanseController::class, 'AllExpanse'])->name('expanse.all');
Route::get('/expanse/edit/{id}', [ExpanseController::class, 'EditExpanse'])->name('expanse.edit');
Route::get('/expanse/delete/{id}', [ExpanseController::class, 'DeleteExpanse'])->name('expanse.delete');

Route::post('/expanse/store', [ExpanseController::class, 'StoreExpanse'])->name('expanse.store');
Route::post('/expanse/update/{id}', [ExpanseController::class, 'UpdateExpanse'])->name('expanse.update');

// Expanse Details Controller
Route::get('/expanse/details/all', [ExpanseDetailsController::class, 'AllExpanse'])->name('expanseDetails.all');
Route::get('/expanse/details/edit/{id}', [ExpanseDetailsController::class, 'EditExpanse'])->name('expanseDetails.edit');
Route::get('/expanse/details/delete/{id}', [ExpanseDetailsController::class, 'DeleteExpanse'])->name('expanseDetails.delete');

Route::post('/expanse/details/store', [ExpanseDetailsController::class, 'StoreExpanse'])->name('expanseDetails.store');
Route::post('/expanse/details/update/{id}', [ExpanseDetailsController::class, 'UpdateExpanse'])->name('expanseDetails.update');

// Coupon Controller
Route::get('/coupon/details/all', [CouponController::class, 'AllCoupon'])->name('coupon.all');
Route::get('/coupon/details/edit/{id}', [CouponController::class, 'EditCoupon'])->name('coupon.edit');
Route::get('/coupon/details/delete/{id}', [CouponController::class, 'DeleteCoupon'])->name('coupon.delete');

Route::post('/coupon/details/store', [CouponController::class, 'StoreCoupon'])->name('coupon.store');
Route::post('/coupon/details/update/{id}', [CouponController::class, 'UpdateCoupon'])->name('coupon.update');


/// Frontend
Route::post('/coupon/apply/all', [CouponController::class, 'ApplyCoupon'])->name('coupon.apply');

/// Frontend
Route::get('/profile/all', [RegisterController::class, 'showProfile'])->name('profile.details');



// Report Details Controller
Route::get('/report/all', [ReportController::class, 'AllReport'])->name('report.all');










Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    // $users = User::all();
    $users = DB::table('users')->get();

    return view('dashboard', compact('users'));
})->name('dashboard');
