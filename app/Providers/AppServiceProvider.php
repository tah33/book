<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Setting;
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
        View::composer('*', function ($view) {
            $view->with('setting', Setting::first());
        });
        View::composer('frontend.header', function ($view) {
            $view->with('carts', Cart::where('user_id',auth()->id())->get());
            $view->with('sidebar_categories', Category::where('status',1)->get());
        });
    }
}
