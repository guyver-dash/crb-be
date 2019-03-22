<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\Branch\BranchController;
use App\Repo\Branch\BranchInterface;
use App\Repo\Branch\BranchRepository;


class BranchServiceProvider extends ServiceProvider
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
        $this->app->when(BranchController::class)
        ->needs(BranchInterface::class)
        ->give(BranchRepository::class);
    }
}
