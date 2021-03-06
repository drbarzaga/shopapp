<?php

namespace App\Providers;

use App\Repositories\IRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\IRepository',
            'App\Repositories\UserRepository',
            'App\Repositories\CategoryRepository',
            'App\Repositories\LocalRepository',
            'App\Repositories\ProductRepository',
            'App\Repositories\SliderRepository'
        );
    }
}
