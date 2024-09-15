<?php

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
