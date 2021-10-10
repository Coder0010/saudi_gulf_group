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
// Route::get('/frontend',function(){
//     return redirect()->route('frontend.index');
// });
// Route::get('/backend',function(){
//     return redirect()->route('backend.index');
// });


Route::group(['as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');
    Route::post('coupons/request', 'FrontendController@couponRequest')->name('coupons.request');
    Route::get('portfolios', 'FrontendController@portfoliosIndex')->name('portfolios.index');
    Route::get('portfolios/show/{portfolio}', 'FrontendController@portfoliosShow')->name('portfolios.show');
    Route::get('services', 'FrontendController@servicesIndex')->name('services.index');
    Route::get('services/show/{service}', 'FrontendController@servicesShow')->name('services.show');
    Route::get('contact-us', 'FrontendController@contactUs')->name('contact-us');
    Route::post('contact-us/request', 'FrontendController@contactUsRequest')->name('contact-us.request');
});

Route::group(['as' => 'backend.', 'prefix' => 'backend'], function () {
    Auth::routes([
        'register' => env('APP_ENV') == 'local' ? true : false,
        'verify'   => false,
        'reset'    => false,
    ]);
    Route::get('home', 'BackendController@index')->name('index');
    Route::patch('sections/type/{type}', 'BackendController@updateSection')->name('sections.update');
    Route::resource('services', 'ServiceController');
    Route::resource('clients', 'ClientController');
    Route::resource('portfolios', 'PortfolioController');
    Route::get('leads', 'BackendController@leadsIndex')->name('leads.index');
});
