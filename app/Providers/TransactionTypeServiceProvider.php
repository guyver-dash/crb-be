<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\TransactionType\TransactionTypeInterface;
use App\Repo\TransactionType\TransactionTypeRepository;
use App\Http\Controllers\API\TransactionType\TransactionTypeController;
class TransactionTypeServiceProvider extends ServiceProvider
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
        $this->app->when(TransactionTypeController::class)
        ->needs(TransactionTypeInterface::class)
        ->give(TransactionTypeRepository::class);
    }
}
