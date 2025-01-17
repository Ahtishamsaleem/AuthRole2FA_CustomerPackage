<?php

namespace authrole2fa\AuthPackage;

use Illuminate\Support\ServiceProvider;

class AuthPackageServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge package config
        $this->mergeConfigFrom(__DIR__.'/../config/authpackage.php', 'authpackage');
    }

    public function boot()
    {
        // Publish config
        $this->publishes([
            __DIR__.'/../config/authpackage.php' => config_path('authpackage.php'),
        ], 'config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/authpackage'),
        ], 'views');

        // Publish routes
        $this->publishes([
            __DIR__.'/../routes/auth.php' => base_path('routes/auth.php'),
        ], 'routes');

        // Publish any other files in src (like models, controllers, etc.)
        $this->publishes([
            __DIR__.'/../src/Models' => app_path('Models'),
            __DIR__.'/../src/Http/Controllers' => app_path('Http/Controllers'),
        ], 'src');

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/auth.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'authpackage');
    }
}
