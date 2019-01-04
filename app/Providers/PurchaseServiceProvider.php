<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Purchase\PurchaseInterface;
use App\Repo\Purchase\PurchaseRepository;
use App\Repo\Purchase\PurchaseItemsRepository;
use App\Http\Controllers\API\Purchase\PurchaseController;
use App\Http\Controllers\API\Purchase\PurchaseItemsController;
class PurchaseServiceProvider extends ServiceProvider
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
        $this->app->when(PurchaseController::class)
          ->needs(PurchaseInterface::class)
          ->give(PurchaseRepository::class);
        
          $this->app->when(PurchaseItemsController::class)
          ->needs(PurchaseInterface::class)
          ->give(PurchaseItemsRepository::class);
    }
}
