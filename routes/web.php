<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// l'home page è temporaneamente statica, poi implementeremo Vue e tutta la parte front-end
Route::get('/', function() {
    return view('guests.home');
})->name('home');

Auth::routes();

Route::middleware('auth')
    ->namespace('Restaurants')
    ->name('restaurants.')
    ->prefix('restaurants')
    ->group(function() {
    
    Route::get('/dashboard', function() {
        return view('restaurants.dashboard');
    });

    Route::resource('/statistic', 'StatisticController');

    Route::resource('/plates', 'PlatesController');
});

