<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Lunar\Facades\ModelManifest;
use Lunar\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $models = collect([
            Product::class            => \App\Models\Product::class,
            //ProductVariant::class     => \App\Models\ProductVariant::class,
            //ProductOption::class      => \App\Models\ProductOption::class,
            //ProductOptionValue::class => \App\Models\ProductOptionValue::class,
            //Collection::class         => \App\Models\Collection::class,
            //Customer::class           => \App\Models\Customer::class,
            //Cart::class               => \App\Models\Cart::class,
            //CartLine::class           => \App\Models\CartLine::class,
            //Order::class              => \App\Models\Order::class,
            //OrderLine::class          => \App\Models\OrderLine::class,
        ]);

        ModelManifest::register($models);
    }
}
