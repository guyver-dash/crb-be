<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Purchase\PurchaseInterface;
use App\Repo\Purchase\PurchaseRepository;
use App\Http\Controllers\API\Purchase\PurchaseController;

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
    }
}
