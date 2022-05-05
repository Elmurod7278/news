<?php

namespace App\Providers;

use App\Models\Advertise;
use App\Models\Category;
use App\Models\News;
use App\Models\Region;
use App\Services\CategoryService;
use Illuminate\Support\Facades\View;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('category',Category::all());
        View::share('region',Region::all());
        View::share('reklama',Advertise::all()->random(1)->first());
    }
}
