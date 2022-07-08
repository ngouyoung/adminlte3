<?php

namespace Wemade\AdminLte3;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    protected $laravel;

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

        $this->publishes([
            __DIR__ . '/views' => resource_path('views'),
            __DIR__ . '/app' => app_path('./../app'),
        ]);
    }

    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function registerModels()
    {
        $models = [
            'Models/User.php',
            'Models/Role.php',
            'Models/GroupPermission.php',
            'Models/Permission.php',
        ];

        foreach ($models as $model) {
            copy(
                __DIR__.'/app/' . $model,
                base_path($model)
            );
        }
    }
}
