<?php

namespace Arseniys1\Opcache;

use Illuminate\Support\ServiceProvider;

class OpcacheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            if (! str_contains($this->app->version(), 'Lumen')) {
                $this->publishes([
                    __DIR__.'/../config/opcache.php' => config_path('opcache.php'),
                ], 'config');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // config
        $this->mergeConfigFrom(__DIR__.'/../config/opcache.php', 'opcache');

        if (str_contains($this->app->version(), 'Lumen') && ! property_exists($this->app, 'router')) {
            $router = $this->app;
        } else {
            $router = $this->app->router;
        }

        // bind routes
        $router->group([
            'middleware'    => [\Arseniys1\Opcache\Http\Middleware\Request::class],
            'prefix'        => 'opcache-api',
            'namespace'     => 'Arseniys1\Opcache\Http\Controllers',
        ], function ($router) {
            require __DIR__.'/Http/routes.php';
        });
    }
}
