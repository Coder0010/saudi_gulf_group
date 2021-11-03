<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Package;
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

    public function sharePackages($to)
    {
        view()->composer($to, function ($view) {
            $view->with('packages', Package::latest()->get());
        });
    }

    public function backendComposer()
    {
        $this->shareClients('backend.services.form');
        $this->sharePortfolios('backend.services.form');

        $this->shareServices('backend.sections.home-page.slider-section');
        view()->composer(['backend.sections.home-page.slider-section'], function ($view) {
            $view->with('selected_services', Section::whereType('slider-section')->first()->services()->pluck('itemable_id'));
        });
    }

    public function frontendComposer()
    {
        view()->composer(['frontend.sections.slider-section'], function ($view) {
            $tempServices = Section::whereType('slider-section')->first()->services;
            $results = [];
            foreach ($tempServices as $service) {
                $results[] = Service::find($service->itemable_id);
            }
            $view->with('selected_services', $results);
            $view->with('sliderSection', Section::whereType('slider-section')->first());
        });

        view()->composer(['frontend.sections.coupon-section'], function ($view) {
            $view->with('couponSection', Section::whereType('coupon-section')->first());
        });

        view()->composer(['frontend.sections.story-section'], function ($view) {
            $view->with('storySection', Section::whereType('story-section')->first());
        });

        view()->composer(['frontend.sections.integrated-section'], function ($view) {
            $view->with('integratedSection', Section::whereType('integrated-section')->first());
        });

        view()->composer(['frontend.sections.services-section'], function ($view) {
            $view->with('serviceSection', Section::whereType('service-section')->first());
        });

        view()->composer(['frontend.sections.portfolios-section'], function ($view) {
            $view->with('portfolioSection', Section::whereType('portfolio-section')->first());
        });

        $this->shareServices(['frontend.sections.services-section', 'frontend.partials.navbar', 'frontend.services.index', 'frontend.contact-us']);

        $this->sharePortfolios(['frontend.sections.portfolios-section', 'frontend.portfolios.index',]);

        view()->composer(['frontend.partials.footer', 'frontend.partials.header'], function ($view) {
            $view->with('aboutUsSection', Section::whereType('about-us-section')->first());
        });

        view()->composer(['frontend.contact-us'], function ($view) {
            $view->with('contactUsSection', Section::whereType('contact-us-section')->first());
        });

        view()->composer(['frontend.our-story'], function ($view) {
            $view->with('storyPageOneSection', Section::whereType('story-page-one-section')->first());
            $view->with('storyPageTwoSection', Section::whereType('story-page-two-section')->first());
            $view->with('storyPageThreeSection', Section::whereType('story-page-three-section')->first());
            $view->with('storyPageFourSection', Section::whereType('story-page-four-section')->first());
        });
        $this->sharePackages(['frontend.packages.index',]);

    }
}
