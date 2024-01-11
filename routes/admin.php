<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\DiscountController;
use App\Http\Controllers\Product\ItemController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Setting\OfficeSettingController;
use App\Http\Controllers\Setting\TaxController;
use App\Http\Controllers\TestmonialController;
use App\Http\Controllers\UserManagement\RoleController;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Controllers\Website\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::prefix('product')->as('product.')->group(function (){
    Route::resource('item', ItemController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('discount', DiscountController::class);
});

Route::resource('testimonial', TestmonialController::class);

Route::prefix('setting')->as('setting.')->group(function (){
    Route::resource('tax', TaxController::class);
    Route::resource('officeSetting', OfficeSettingController::class)->only('index', 'update');
});

Route::prefix('userManagement')->as('userManagement.')->group(function (){
   Route::resource('user', UserController::class);
   Route::resource('role', RoleController::class);
});

Route::prefix('website')->as('website.')->group(function (){
    Route::resource('slider', SliderController::class);
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('order')->as('order.')->group(function (){
    Route::get('getAllOrder', [AdminController::class, 'geAllOrder'])->name('getAllOrder');
    Route::get('order/{order}/updateStatus', [AdminController::class, 'updateStatus'])->name('updateStatus');
});

Route::get('faq', [FAQController::class, 'index'])->name('faq');

Route::resource('promotion', PromotionController::class);
