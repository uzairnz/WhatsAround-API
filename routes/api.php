<?php

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\User;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 User Routes
 */
Route::get('user', 'UserController@index');

Route::get('user/{user_id}', 'UserController@show');

Route::post('user', 'UserController@store');

Route::put('user/{user_id}', 'UserController@update');

Route::delete('user/{user_id}', 'UserController@destroy');


/*
 Partner Routes
 */
Route::get('partner', 'PartnerController@index');

Route::get('partner/{partner_id}', 'PartnerController@show');

Route::post('partner', 'PartnerController@store');

Route::put('partner/{partner_id}', 'PartnerController@update');

Route::delete('partner/{partner_id}', 'PartnerController@destroy');


/*
 Service Routes
 */
Route::get('service', 'ServiceController@index');

Route::get('service/{service_id}', 'ServiceController@show');

Route::post('service', 'ServiceController@store');

Route::put('service/{service_id}', 'ServiceController@update');

Route::delete('service/{service_id}', 'ServiceController@destroy');


/*
 Service Routes
 */
Route::get('quote', 'QuoteController@index');

Route::get('quote/{service_id}', 'QuoteController@show');

Route::post('quote', 'QuoteController@store');

Route::put('quote/{quote_id}', 'QuoteController@update');

Route::delete('quote/{quote_id}', 'QuoteController@destroy');


/*
 Service Routes
 */
Route::get('book', 'BookController@index');

Route::get('book/{book_id}', 'BookController@show');

Route::post('book', 'BookController@store');

Route::put('book/{book_id}', 'BookController@update');

Route::delete('book/{book_id}', 'BookController@destroy');


/*
 ServiceQuote Routes
 */
