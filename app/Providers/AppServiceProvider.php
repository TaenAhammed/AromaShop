<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\IHelloService',
            'App\Services\HelloService'
        );

        $this->app->bind(
            'App\Repositories\IHelloRepository',
            'App\Repositories\HelloRepository'
        );

        $this->app->bind(
            'App\ViewModels\IStoreProductModel',
            'App\ViewModels\StoreProductModel'
        );

        $this->app->bind(
            'App\Services\IProductService',
            'App\Services\ProductService'
        );

        $this->app->bind(
            'App\Repositories\IProductRepository',
            'App\Repositories\ProductRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
