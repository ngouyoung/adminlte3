<?php

namespace Wemade\AdminLte3;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'backend');

        $this->publishes([
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/app' => app_path('app'),
            __DIR__.'/routes' => public_path('./app'),
        ]);
    }
}
