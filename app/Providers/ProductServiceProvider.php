<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Product\ProductInterface;
use App\Repo\Product\ProductRepository;
use App\Http\Controllers\API\Product\ProductController;
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
    }
}
