<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Cart;

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
        view()->composer('frontend.layouts.homemenu', function($view){
            $categories = Category::where('parent_id', 0)->get();
            $view->with('categories',$categories);
        });
        view()->composer('*', function($view){
            $carts = Cart::content();
            $view->with('carts',$carts);
        });
        
    }
}
