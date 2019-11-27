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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/subscribe/{type}', 'HomeController@subscribe')->name('subscribe');
    Route::get('/login', 'HomeController@login')->name('login');
    Route::get('/forms/success/{unid}', 'HomeController@formSuccess')->name('form.success');
    Route::get('/plans', 'HomeController@plan')->name('plans');
    Route::get('/channels', 'HomeController@channels')->name('channels');
    Route::post('/reg/client', 'ClientController@register')->name('client.reg');
    Route::post('/login/client', 'ClientController@login')->name('client.login');
});

Route::get('/load_db', 'TableController@loadDB');
Route::get('/reset_db', 'TableController@resetDB');



Route::group(['middleware'=> 'admin'], function() {
    Route::prefix('admin')->group(function () {

    });
});

Route::group(['middleware'=> 'client'], function() {
    Route::prefix('client')->group(function () {
        Route::get('dashboard', 'ClientController@dashboard')->name('client.dashboard');
    });
});

