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
        $this->registerRoutes();
//        $this->loadViewsFrom(__DIR__ . '/views', 'backend');

        $this->publishes([
            __DIR__.'/views' => resource_path('views'),
            __DIR__.'/app' => app_path('./../app'),
        ]);
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__.'/routes/web.php'),
            FILE_APPEND
        );
    }

    public function registerRoutes() {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
}
