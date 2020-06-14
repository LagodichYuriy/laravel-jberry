<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Observers\ProductObserver;
use App\Observers\UsersProductObserver;

use App\Product;
use App\UsersProduct;

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
		Product::observe(ProductObserver::class);
		UsersProduct::observe(UsersProductObserver::class);
    }
}
