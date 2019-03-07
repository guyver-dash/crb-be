<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\Places\PlacesController;
use App\Repo\Places\PlacesInterface;
use App\Repo\Places\PlacesRepository;

class PlacesServiceProvider extends ServiceProvider
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
        $this->app->when(PlacesController::class)
            ->needs(PlacesInterface::class)
            ->give(PlacesRepository::class);
    }
}
