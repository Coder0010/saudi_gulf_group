<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('services', 'ServiceController');
    Route::resource('clients', 'ClientController');
    Route::resource('portfolios', 'PortfolioController');
});
