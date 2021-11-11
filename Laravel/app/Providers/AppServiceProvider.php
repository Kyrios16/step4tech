<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Dao registration
        $this->app->bind('App\Contracts\Dao\Categories\CategoriesDaoInterface', 'App\Dao\Categories\CategoriesDao');

        //Services registration
        $this->app->bind('App\Contracts\Services\Categories\CategoriesServiceInterface', 'App\Services\Categories\CategoriesService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
