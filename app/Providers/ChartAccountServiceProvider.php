<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\ChartAccount\ChartAccountController;
use App\Http\Controllers\Api\ChartAccount\CompanyChartAccountController;
use App\Repo\ChartAccount\ChartAccountInterface;
use App\Repo\ChartAccount\ChartAccountRepository;

class ChartAccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->when(ChartAccountController::class)
        ->needs(ChartAccountInterface::class)
        ->give(ChartAccountRepository::class);

        $this->app->when(CompanyChartAccountController::class)
        ->needs(ChartAccountInterface::class)
        ->give(ChartAccountRepository::class);
    }
}
