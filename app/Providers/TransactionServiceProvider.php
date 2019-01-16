<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Transaction\TransactionInterface;
use App\Repo\Transaction\TransactionRepository;
use App\Http\Controllers\API\Transaction\TransactionController;

class TransactionServiceProvider extends ServiceProvider
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
        $this->app->when(TransactionController::class)
          ->needs(TransactionInterface::class)
          ->give(TransactionRepository::class);
    }
}
