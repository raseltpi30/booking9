<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;

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

Auth::routes();
