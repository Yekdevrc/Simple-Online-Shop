<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\TestimonialController;
use App\Http\Controllers\Guest\GuestUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [FrontendController::class, 'index']);
    Route::group(['middleware' => ['auth:guest']], function () {
        Route::resource('order', OrderController::class)->only('index', 'store', 'destroy');
    });


Route::post('login', [AuthController::class, 'login'])->name('auth.login');

Route::prefix('session')->as('session.')->group(function (){
    Route::get('getSession', [SessionController::class, 'getSession'])->name('getSession');
   Route::post('store', [SessionController::class, 'store'])->name('store');
   Route::get('flush', [SessionController::class, 'flush'])->name('flush');
});

Route::get('wishlist', [FrontendController::class, 'wishlist'])->name('wishlist');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('product', [FrontendController::class, 'product'])->name('product');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');


Route::prefix('user')->as('user.')->group(function (){
    Route::get('login', [GuestUserController::class, 'index'])->name('login');
    Route::post('login', [GuestUserController::class, 'login'])->name('login');
    Route::get('register', [GuestUserController::class, 'registerPage'])->name('register');
    Route::post('register', [GuestUserController::class, 'register'])->name('register');
});


Route::post('faq', [FAQController::class, 'store'])->name('faq');

Route::get('/login', function (){
    return view('auth.login');
});
