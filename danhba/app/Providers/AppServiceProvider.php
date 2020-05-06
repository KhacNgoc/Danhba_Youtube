<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

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
        view()->composer('layouts.header', function($view){
            $cates = Category::all();
            $view->with('cates', $cates);
        });
        view()->composer('pages.index', function($view){
            $cates = Category::all();
            $view->with('cates', $cates);
        });
    }
}
