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


Route::post('service-management/search', 'ServiceManagementController@search')->name('service-management.search');
Route::resource('service-management', 'ServiceManagementController');

Route::post('quote-management/search', 'QuoteManagementController@search')->name('quote-management.search');
Route::resource('quote-management', 'QuoteManagementController');

Route::post('book-management/search', 'BookManagementController@search')->name('book-management.search');
Route::resource('book-management', 'BookManagementController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
