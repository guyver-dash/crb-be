<?php

namespace App\Providers;

use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Product\CategoryProductController;
use App\Repo\Product\ProductInterface;
use App\Repo\Product\ProductRepository;
use App\Repo\Product\CategoryProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(ProductController::class)
            ->needs(ProductInterface::class)
            ->give(ProductRepository::class);

        $this->app->when(CategoryProductController::class)
            ->needs(ProductInterface::class)
            ->give(CategoryProductRepository::class);
    }
}
