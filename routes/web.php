<?php
// Route::get('/frontend',function(){
//     return redirect()->route('frontend.index');
// });
// Route::get('/backend',function(){
//     return redirect()->route('backend.index');
// });

Route::group(['as' => 'frontend.'], function () {
    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    })->name('language');
    Route::get('/', 'FrontendController@index')->name('index');
    Route::post('coupons/request', 'FrontendController@couponRequest')->name('coupons.request');
    Route::get('portfolios', 'FrontendController@portfoliosIndex')->name('portfolios.index');
    Route::get('portfolios/show/{portfolio}', 'FrontendController@portfoliosShow')->name('portfolios.show');
    Route::get('services', 'FrontendController@servicesIndex')->name('services.index');
    Route::get('services/show/{service}', 'FrontendController@servicesShow')->name('services.show');
    Route::get('packages', 'FrontendController@packagesIndex')->name('packages.index');
    Route::get('contact-us', 'FrontendController@contactUs')->name('contact-us');
    Route::post('contact-us/request', 'FrontendController@contactUsRequest')->name('contact-us.request');
    Route::get('our-story', 'FrontendController@ourStory')->name('our-story');

});

Route::group(['as' => 'backend.', 'prefix' => 'backend'], function () {
    Auth::routes([
        'register' => env('APP_ENV') == 'local' ? true : false,
        'verify'   => false,
        'reset'    => false,
    ]);
    Route::get('home', 'BackendController@index')->name('index');
    Route::patch('sections/update', 'BackendController@updateSection')->name('sections.update');
    Route::resource('services', 'ServiceController')->except('show');
    Route::resource('clients', 'ClientController')->except('show');
    Route::resource('portfolios', 'PortfolioController')->except('show');
    Route::resource('packages', 'PackageController')->except('show');
    Route::get('leads', 'BackendController@leadsIndex')->name('leads.index');
});
