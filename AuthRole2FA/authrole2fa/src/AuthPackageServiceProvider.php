<?php

namespace YourVendor\AuthPackage;

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

        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/auth.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'authpackage');
    }
}
