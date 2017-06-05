<?php

namespace Gobi\LocationFinder;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'locationfinder');//
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/gobi/locationfinder'),
        ]);

        include __DIR__.'/routes.php';
        $this->app->make('Gobi\LocationFinder\LocationFinderControler');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        

    }
}
