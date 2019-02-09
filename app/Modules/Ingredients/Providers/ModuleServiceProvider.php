<?php

namespace App\Modules\Ingredients\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'ingredients');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'ingredients');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'ingredients');
        $this->loadConfigsFrom(__DIR__.'/../config');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
