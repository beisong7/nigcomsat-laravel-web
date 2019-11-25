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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/subscribe/{type}', 'HomeController@subscribe')->name('subscribe');
Route::get('/login', 'HomeController@login')->name('login');
Route::get('/plans', 'HomeController@plan')->name('plans');
Route::get('/channels', 'HomeController@channels')->name('channels');
