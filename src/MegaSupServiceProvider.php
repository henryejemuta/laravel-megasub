<?php

namespace HenryEjemuta\LaravelMegaSup;

use HenryEjemuta\LaravelMegaSup\Console\InstallLaravelMegaSup;
use Illuminate\Support\ServiceProvider;

class MegaSupServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('megasup.php'),
            ], 'config');

            // Registering package commands.
            $this->commands([
                InstallLaravelMegaSup::class,
            ]);

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'megasup');

        // Register the main class to use with the facade
        $this->app->singleton('megasup', function ($app) {
            $baseUrl = config('megasup.base_url');
            $instanceName = 'megasup';

            return new MegaSup(
                $baseUrl,
                $instanceName,
                config('megasup')
            );
        });

    }
}
