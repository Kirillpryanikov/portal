<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('investor')->group(function () {
    Route::get('/menu', 'DriverController@getDrivers')->name('menu');
    Route::get('/{id}', 'DriverController@getDriverMenu')->name('personal_menu');
    Route::get('/booking/{id}', 'DriverController@getBooking')->name('menu_booking');
    Route::get('/settings/{id}', 'DriverController@getDriverProfile')->name('get_driver_profile');
    Route::get('/booking/detail/{id}', 'DriverController@getBookingDetail')->name('get_booking_detail');
    Route::get('/missed/detail/{id}', 'DriverController@getMissedDetail')->name('get_missed_detail');
    Route::get('/wallets/{id}', 'DriverController@getWallets')->name('get_wallets');
    Route::get('/complaints_filed/{id}', 'DriverController@ComplaintsFiled')->name('get_complaints_filed');
    Route::get('/statements/{id}', 'DriverController@getStatements')->name('get_statements');
});
