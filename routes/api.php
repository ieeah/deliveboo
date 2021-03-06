<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Endpoint API
Route::namespace('Api')->group(function(){
    //Orders
    Route::get('/orders','OrderController@index');
    Route::get('/restaurants', 'RestaurantsController@index');
    Route::get('/restaurant/{id}', 'RestaurantsController@restaurant');
    Route::get('/restaurants/{id}', 'RestaurantsController@type');
    Route::get('/types', 'CategoriesController@index');
    Route::get('/plates/{id}', 'PlateController@index');

    Route::get('/save', 'OrderController@store');
    Route::get('/validation', 'OrderController@serverValidation');

    //Braintree

    Route::get('/token', 'BraintreeController@token');
    Route::get('/sale/{amount}/{nonce}', 'BraintreeController@sale');

});
