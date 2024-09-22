<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\AdminCouponController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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

Route::group(['namespace' => 'App\Http\Controllers\frontend'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::get('/book-now', 'PagesController@booking')->name('book-now');
    Route::get('/contact', 'PagesController@contact')->name('contact');
    Route::get('/services', 'PagesController@services')->name('services');
    Route::get('/faq', 'PagesController@faq')->name('faq');
    Route::get('/quotes', 'PagesController@quotes')->name('quotes');
    Route::post('/booking/store', 'BookingController@store')->name('booking.store');
    Route::get('/success', 'BookingController@success')->name('payment.success');
    Route::get('/cancel', 'BookingController@cancel')->name('payment.cancel');
    Route::get('/payment-canceled', 'BookingController@paymentCanceled')->name('payment.canceled');
    // Route::get('/cancel', 'BookingController@cancel')->name('payment.succe');
});

Route::post('/check-coupon', [CouponController::class, 'checkCoupon']);
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Route::post('/remove-coupon', [CouponController::class, 'removeCoupon']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Password Reset Routes
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/home',[HomeController::class, 'adminHome'])->middleware('auth')->name('admin.home');


Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix' => 'admin','middleware' => 'auth'], function () {
    Route::get('/home',[HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/customers',[CustomerController::class, 'index'])->name('customer');
    Route::get('/customer/details/{id}',[CustomerController::class, 'customerDetails'])->name('customer.details');
    Route::get('/customer/edit/{id}',[CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update/{id}',[CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/customer/delete/{id}',[CustomerController::class, 'destroy'])->name('customer.delete');

    // Route for coupon 

    Route::get('/coupons',[AdminCouponController::class, 'index'])->name('coupon.index');
    Route::post('/coupon/store',[AdminCouponController::class, 'store'])->name('coupon.store');
    Route::get('/coupon/edit/{id}',[AdminCouponController::class, 'edit'])->name('coupon.edit');
    Route::post('/coupon/update/{id}',[AdminCouponController::class, 'update'])->name('coupon.update');
    Route::get('/coupon/delete/{id}',[AdminCouponController::class, 'destroy'])->name('coupon.delete');

    // for contact show 
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');
});


Auth::routes();
