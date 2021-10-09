<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Section;
use App\Models\Service;
use App\Models\Portfolio;
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
        $this->backendComposer();

        $this->frontendComposer();
    }

    public function shareClients($to)
    {
        view()->composer($to, function ($view) {
            $view->with('clients', Client::latest()->get());
        });
    }

    public function sharePortfolios($to)
    {
        view()->composer($to, function ($view) {
            $view->with('portfolios', Portfolio::latest()->get());
        });
    }

    public function shareServices($to)
    {
        view()->composer($to, function ($view) {
            $view->with('services', Service::latest()->get());
        });
    }

    public function backendComposer()
    {
        $this->shareClients('backend.services.form');
        $this->sharePortfolios('backend.services.form');

        $this->shareServices('backend.sections.welcome-section');
        view()->composer(['backend.sections.welcome-section'], function ($view) {
            $view->with('selected_services', Section::whereType('welcome-section')->first()->services()->pluck('itemable_id'));
        });

        view()->composer(['backend.sections.services-section'], function ($view) {
            $view->with('serviceSection', Section::whereType('service-section')->first());
        });
        view()->composer(['backend.sections.portfolios-section'], function ($view) {
            $view->with('portfolioSection', Section::whereType('portfolio-section')->first());
        });
    }

    public function frontendComposer()
    {
        view()->composer(['frontend.sections.welcome-section'], function ($view) {
            $tempServices = Section::whereType('welcome-section')->first()->services;
            $results = [];
            foreach ($tempServices as $service) {
                $results[] = Service::find($service->itemable_id);
            }
            $view->with('selected_services', $results);
            $view->with('welcomeSection', Section::whereType('welcome-section')->first());
        });

        view()->composer(['frontend.sections.coupon-section'], function ($view) {
            $view->with('couponSection', Section::whereType('coupon-section')->first());
        });

        view()->composer(['frontend.sections.story-section'], function ($view) {
            $view->with('storySection', Section::whereType('story-section')->first());
        });

        $this->shareServices('frontend.sections.services-section');
        view()->composer(['frontend.sections.services-section'], function ($view) {
            $view->with('serviceSection', Section::whereType('service-section')->first());
        });

        $this->sharePortfolios('frontend.sections.portfolios-section');
        view()->composer(['frontend.sections.portfolios-section'], function ($view) {
            $view->with('portfolioSection', Section::whereType('portfolio-section')->first());
        });

    }
}
