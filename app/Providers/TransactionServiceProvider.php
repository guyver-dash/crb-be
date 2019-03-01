<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Transaction\TransactionInterface;
use App\Repo\Transaction\TransactionRepository;
use App\Repo\Transaction\DisbursementTransactionRepository;
use App\Repo\Transaction\SaleInvoiceTransactionRepository;
use App\Http\Controllers\API\Transaction\TransactionController;
use App\Http\Controllers\API\Transaction\DisbursementTransactionController;
use App\Http\Controllers\API\Transaction\SaleInvoiceTransactionController;
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
        
        $this->app->when(DisbursementTransactionController::class)
          ->needs(TransactionInterface::class)
          ->give(DisbursementTransactionRepository::class);
        
          $this->app->when(SaleInvoiceTransactionController::class)
          ->needs(TransactionInterface::class)
          ->give(SaleInvoiceTransactionRepository::class);
    }
}
