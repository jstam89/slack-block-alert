<?php

namespace Jeremys\SlackBlockAlert;

use Illuminate\Support\ServiceProvider;

class SlackBlockAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'slack-block-alert');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'slack-block-alert');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/slack-block-alert.php' => config_path('slack-block-alert.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/slack-block-alert'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/slack-block-alert'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/slack-block-alert'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/slack-block-alert.php', 'slack-block-alert');

        // Register the main class to use with the facade
        $this->app->singleton('slack-block-alert', function () {
            return new SlackBlockAlert;
        });
    }
}
