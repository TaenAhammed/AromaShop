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
            'App\ViewModels\ICreateProductModel',
            'App\ViewModels\CreateProductModel'
        );

        $this->app->bind(
            'App\BusinessObjects\IProduct',
            'App\BusinessObjects\Product'
        );

        $this->app->bind(
            'App\Services\IProductService',
            'App\Services\ProductService'
        );

        $this->app->bind(
            'App\Repositories\IProductRepository',
            'App\Repositories\ProductRepository'
        );

        $this->app->bind(
            'App\ViewModels\IViewProductModel',
            'App\ViewModels\ViewProductModel'
        );

        $this->app->bind(
            'App\ViewModels\ICreateCategoryModel',
            'App\ViewModels\CreateCategoryModel'
        );

        $this->app->bind(
            'App\BusinessObjects\ICategory',
            'App\BusinessObjects\Category'
        );

        $this->app->bind(
            'App\Services\IProductCategoryService',
            'App\Services\ProductCategoryService'
        );

        $this->app->bind(
            'App\Repositories\IProductCategoryRepository',
            'App\Repositories\ProductCategoryRepository'
        );

        $this->app->bind(
            'App\ViewModels\IViewCategoryModel',
            'App\ViewModels\ViewCategoryModel'
        );

        $this->app->bind(
            'App\Services\SessionService\ISessionService',
            'App\Services\SessionService\SessionService'
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
