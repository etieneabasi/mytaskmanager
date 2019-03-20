<?php

namespace Etieneabasi\MyTaskManager;

use Illuminate\Support\ServiceProvider;

class MyTaskManagerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'etieneabasi');
        $this->loadViewsFrom(__DIR__.'/views', 'etieneabasi');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton('mytaskmanager', function ($app) {
            return new MyTaskManager;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['mytaskmanager'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
    
        // Publishing the views.
        $this->publishes([
            __DIR__.'/views' => base_path('vendor/etieneabasi'),
        ], 'views');

        // Publishing assets.
        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/etieneabasi'),
        ], 'public');

        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');
    }
}
