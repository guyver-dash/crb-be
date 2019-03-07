<?php

namespace App\Providers;

use App\Http\Controllers\Api\Menu\MenuController;
use App\Http\Controllers\Api\Menu\DashboardMenuController;
use App\Repo\Menu\MenuInterface;
use App\Repo\Menu\MenuRepository;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
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
        $this->app->when(MenuController::class)
            ->needs(MenuInterface::class)
            ->give(MenuRepository::class);

        $this->app->when(DashboardMenuController::class)
            ->needs(MenuInterface::class)
            ->give(MenuRepository::class);
    }
}
