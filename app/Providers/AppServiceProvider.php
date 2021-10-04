<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('backend.services.form', function ($view) {
            $view->with('clients', \App\Models\Client::latest()->get());
            $view->with('portfolios', \App\Models\Portfolio::latest()->get());
        });
    }
}
