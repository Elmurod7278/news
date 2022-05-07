<?php

namespace App\Providers;

use App\Models\Advertise;
use App\Models\Category;
use App\Models\News;
use App\Models\PersonalAccessToken;
use App\Models\Region;
use App\Services\CategoryService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;

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
        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);

        View::share('category',Category::all());
        View::share('region',Region::all());
        View::share('last3News',News::offset(0)->orderBy('created_at','DESC')->limit(3)->get());
    }
}
