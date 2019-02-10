<?php

namespace App\Modules\Basket\Providers;

use App\Modules\Basket\Models\Basket;
use App\Modules\Basket\Observers\BasketObserver;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'basket');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'basket');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'basket');
        $this->loadConfigsFrom(__DIR__.'/../config');

        Basket::observe(BasketObserver::class);
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
