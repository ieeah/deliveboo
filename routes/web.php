<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

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


Route::middleware('auth')
    ->namespace('Restaurants')
    ->name('restaurants.')
    ->prefix('restaurants')
    ->group(function() {
    
   /*  Route::get('/dashboard', function() {
        $now = Carbon::now();
        $today = $now->toDateString();
        return view('restaurants.dashboard', compact('today'));
    }); */
    Route::resource('/plates', 'PlatesController');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/profile', 'Homecontroller@edit')->name('edit_profile');
    Route::post('/profile', 'Homecontroller@update')->name('update_profile');
    Route::get('/statistic', 'StatisticController@index')->name('statistic');
    Route::get('/orders', 'StatisticController@indexOrder')->name('order');
});


Route::get('{any?}', function () {
    return view('guests.front');
})->where('any', '.*');