<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Observers\ProductObserver;
use App\Models\Product;
use App\subCategory;
use App\Category;

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
        $categories = Category::with('subCategories')->get();
        View::share('categories', $categories);

        Product::observe(ProductObserver::class);        

    }
}
