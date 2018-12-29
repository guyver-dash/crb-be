<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Ingredient\IngredientInterface;
use App\Repo\Ingredient\IngredientRepository;
use App\Http\Controllers\API\Ingredient\IngredientController;
class IngredientServiceProvider extends ServiceProvider
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
        $this->app->when(IngredientController::class)
          ->needs(IngredientInterface::class)
          ->give(IngredientRepository::class);
    }
}
