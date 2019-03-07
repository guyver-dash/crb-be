<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\Api\User\UserController;
use App\Repo\User\UserInterface;
use App\Repo\User\UserRepository;

class UserServiceProvider extends ServiceProvider
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
        $this->app->when(UserController::class)
        ->needs(UserInterface::class)
        ->give(UserRepository::class);
    }
}
