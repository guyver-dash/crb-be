<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\AccessRight\AccessRightController;
use App\Repo\AccessRight\AccessRightInterface;
use App\Repo\AccessRight\AccessRightRepository;

class AccessRightServiceProvider extends ServiceProvider
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
        $this->app->when(AccessRightController::class)
        ->needs(AccessRightInterface::class)
        ->give(AccessRightRepository::class);
    }
}
