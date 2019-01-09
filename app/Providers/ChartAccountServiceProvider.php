<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\ChartAccount\ChartAccountInterface;
use App\Repo\ChartAccount\ChartAccountRepository;
use App\Http\Controllers\API\ChartAccount\ChartAccountController;

class ChartAccountServiceProvider extends ServiceProvider
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
        $this->app->when(ChartAccountController::class)
          ->needs(ChartAccountInterface::class)
          ->give(ChartAccountRepository::class);
    }
}
