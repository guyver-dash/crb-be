<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Holding\HoldingInterface;
use App\Repo\Holding\HoldingRepository;
use App\Http\Controllers\API\Holding\HoldingController;
class HoldingServiceProvider extends ServiceProvider
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
        $this->app->when(HoldingController::class)
          ->needs(HoldingInterface::class)
          ->give(HoldingRepository::class);
    }
}
