<?php
namespace AuthRole2FA\AuthRole2FA;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish config, views, and migrations
        $this->publishes([
            __DIR__.'/../config/auth.php' => config_path('auth.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../views' => resource_path('views/vendor/AuthRole2FA'),
        ], 'views');
        
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    public function register()
    {
        // Bind services to the Laravel container
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });
    }
}
