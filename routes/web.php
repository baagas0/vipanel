<?php

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

Route::get('/', function () {
    $data['page_title'] = 'Test';
    return view('welcome', $data);
});

Route::group(['prefix'=>'admin','as'=>'admin.','namespace'=>'Admin'], function(){
    Route::group(['namespace'=>'Auth'], function(){
        Route::get('login','LoginController@showLoginForm')->name('login');
        Route::post('login','LoginController@login');
        Route::post('logout','LoginController@logout')->name('logout');
        Route::group(['prefix'=>'password','as'=>'password.'], function(){
            Route::get('reset','ForgotPasswordController@showLinkRequestForm')->name('request');
            Route::post('email','ForgotPasswordController@sendResetLinkEmail')->name('email');
            Route::get('reset/{token}','ResetPasswordController@showResetForm')->name('reset');
            Route::post('reset','ResetPasswordController@reset')->name('update');
        });
    });

    Route::group(['middleware'=>'auth:admin'], function(){
        routeController('api','Admin\ApiController');

        Route::get('/', function () {
            return redirect('admin/dashboard');
        });
        
        routeController('dashboard','Admin\DashboardController');
        routeController('users','Admin\UsersController');
        routeController('deposits','Admin\DepositsController');
        routeController('orders','Admin\OrdersController');
        routeController('tickets','Admin\TicketsController');
        // routeController('vouchers','Admin\VouchersController');

        routeController('data','Admin\AdminsController');
        routeController('news','Admin\NewsController');
        routeController('payments','Admin\PaymentsController');
        routeController('settings','Admin\SettingsController');
        routeController('log','Admin\LogController');
    });
});

Auth::routes();
