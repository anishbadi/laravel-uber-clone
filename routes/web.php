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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Trip Route
    Route::get('/trip', 'TripController@index')->name('trip');
    Route::get('/trip/create', 'TripController@create')->name('trip.create');
    Route::post('/trip/store', 'TripController@store')->name('trip.store');
    Route::post('/trip/status/update', 'TripController@statusUpdate')->name('trip.update.status');

    // Utility Route 
    Route::post('/get/location/distance', 'UtilityController@getLocationDistance')->name('distance.calculation');
});

