<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\AccountingStandard\AccountingStandardInterface;
use App\Repo\AccountingStandard\AccountingStandardRepository;
use App\Http\Controllers\API\AccountingStandard\AccountingStandardController;

class AccountingStandardServiceProvider extends ServiceProvider
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
        $this->app->when(AccountingStandardController::class)
          ->needs(AccountingStandardInterface::class)
          ->give(AccountingStandardRepository::class);
    }
}
