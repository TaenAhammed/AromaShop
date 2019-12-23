<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use App\ViewModels\DataTablesModel;
use App\ViewModels\SortOrder;
use App\ViewModels\PagedData;

class DataTableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\ViewModels\DataTablesModel', function (Request $request) {
            return new DataTablesModel($request);
        });

        $this->app->bind('App\ViewModels\SortOrder', function ($column, $dir) {
            return new SortOrder($column, $dir);
        });

        $this->app->bind('App\ViewModels\PagedData', function ($products, $totalCount, $totalDisplayCount) {
            return new PagedData($products, $totalCount, $totalDisplayCount);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
