<?php

namespace Wemade\AdminLte3;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

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
        $this->registerModels();
        $this->publishes([
            __DIR__ . '/views' => resource_path('views'),
            __DIR__ . '/app/Helpers' => app_path('Helpers'),
            __DIR__ . '/app/Services' => app_path('Services'),
            __DIR__ . '/app/Traits' => app_path('Traits'),
        ]);
    }

    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }

    public function registerModels()
    {
        $models = [
            '/Models/User.php',
            '/Models/Role.php',
            '/Models/ParentModel.php',
            '/Models/GroupPermission.php',
            '/Models/Permission.php',
        ];

        foreach ($models as $model) {
            if (File::exists(app_path($model))){
                File::delete(app_path($model));
            }
            copy(__DIR__.'/app/' . $model, base_path($model));
        }
    }
}
