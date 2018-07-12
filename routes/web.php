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

/*
  Admin Login
  Routes
*/

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');


Route::post('partner-management/search', 'PartnerManagementController@search')->name('partner-management.search');
Route::resource('partner-management', 'PartnerManagementController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
