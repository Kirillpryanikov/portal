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

Auth::routes();
Route::post('/login_admin', 'UserController@loginAdmin')->name('login_admin');
Route::middleware('un_login')->group(function () {
    Route::get('/', 'UserController@loginPage')->name('login_user');
    Route::post('/login_user', 'UserController@loginUser')->name('Login_post');

});

Route::middleware('is_login')->group(function () {

    Route::post('/file', 'UploadedFileController@uploadFile')->name('file');
    Route::get('/get_files', 'UploadedFileController@getFiles')->name('get_files');
    Route::get('/get_file/{id}', 'UploadedFileController@getFile')->name('get_file');
    Route::get('/show_file/{id}', 'UploadedFileController@showFile')->name('show_file');
    Route::get('/logout', 'UserController@logout')->name('Logout_post');
    Route::get('/change_password/{id}', 'UserController@changePasswordPage')->name('change_password');
    Route::post('/change_password_post', 'UserController@changePassword')->name('change_password_post');
    Route::get('/menu', 'DriverController@getDrivers')->name('menu');
    Route::get('/booking/{id}', 'DriverController@getBooking')->name('menu_booking');
    Route::get('/missed/{id}', 'DriverController@getMissed')->name('menu_missed');
    Route::get('/settings/{id}', 'DriverController@getDriverProfile')->name('get_driver_profile');
    Route::get('/booking/detail/{trip_no}/{driver_id}', 'DriverController@getBookingDetail')->name('get_booking_detail');
    Route::get('/missed/detail/{trip_no}/{driver_id}', 'DriverController@getBookingDetail')->name('get_missed_detail');
    Route::get('/wallet/{id}', 'DriverController@getWallets')->name('get_wallets');
    Route::get('/complaints_filed/{id}', 'DriverController@getComplaintsFiled')->name('get_complaints_filed');
    Route::get('/statements/{id}', 'DriverController@getStatements')->name('get_statements');
    Route::get('/settings-change/{id}', 'DriverController@getMessage')->name('get_message');
    Route::post('/send_message', 'DriverController@sendMessage')->name('post_send_message');
    Route::get('/user_statement','UploadedFileController@getUserStatementInfo')->name('user_statement');
    Route::get('/{id}', 'DriverController@getDriverMenu')->name('personal_menu');


});

