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



Route::group(['middleware'=> 'open'], function() {
    Route::get('loginadmin', 'HomeController@loginadmin')->name('loginadmin');

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/subscribe/{type}', 'HomeController@subscribe')->name('subscribe');
    Route::get('/login', 'HomeController@login')->name('login');
    Route::post('/logout/{guard}', 'HomeController@logout')->name('logout');
    Route::get('/forms/success/{unid}', 'HomeController@formSuccess')->name('form.success');
    Route::get('/plans', 'HomeController@plan')->name('plans');
    Route::get('/channels', 'HomeController@channels')->name('channels');
    Route::post('/reg/client', 'ClientController@register')->name('client.reg');
    Route::post('/login/client', 'ClientController@login')->name('client.login');

    Route::post('/login/admin', 'UserController@login')->name('admin.login');



    //REMOVE ROUTES IN PRODUCTION----
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    // -- ROUTES TO BE REMOVED ABOVE



    // -- TEST ROUTES
    Route::get('/test-customer', 'CleengController@test');
    Route::get('/shows', function (){
        return '';
    });

});

/**
 * LOAD AND RESET DATABASE START
 */

Route::post('/load_db', 'TableController@loadDB');
Route::post('/reset_db', 'TableController@resetDB');
/**
 * LOAD AND RESET DATABASE END
 */

Route::group(['middleware'=> 'admin'], function() {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'UserController@dashboard')->name('admin.dashboard');
        Route::resource('clients', 'ClientController');
        Route::resource('plan', 'PlanController');
        Route::resource('sub', 'SubscriptionController');
        Route::resource('payment', 'PaymentController');
    });
});

Route::group(['middleware'=> 'client'], function() {
    Route::prefix('client')->group(function () {
        Route::get('dashboard', 'ClientController@dashboard')->name('client.dashboard');
        Route::get('subscription', 'ClientController@subscription')->name('client.subscription');
        Route::get('shop/plan', 'PlanController@shopplan')->name('client.shop.plan');
        Route::get('v/acquire', 'VideoController@getvids');


        // Payment Routes
        Route::post('/shop/pay', 'PaymentController@redirectToGateway')->name('shop.pay');
//        Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
    });
});

