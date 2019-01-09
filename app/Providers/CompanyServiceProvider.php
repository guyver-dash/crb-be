<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Holding\HoldingInterface;
use App\Repo\Holding\HoldingRepository;
use App\Http\Controllers\API\Holding\HoldingController;
class CompanyServiceProvider extends ServiceProvider
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
        $this->app->when(CompanyController::class)
          ->needs(CompanyInterface::class)
          ->give(CompanyRepository::class);
    }
}
