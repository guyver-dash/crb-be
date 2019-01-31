<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Company\CompanyInterface;
use App\Repo\Company\CompanyRepository;
use App\Http\Controllers\API\Company\CompanyController;
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
