<?php

namespace App\Providers;

use App\Models\SiteContent;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share site content data with all views
        View::composer('*', function ($view) {
            $siteContent = SiteContent::first();
            $view->with('siteData', $siteContent);
        });
    }
}
