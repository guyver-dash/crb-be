<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\Ingredient\IngredientInterface;
use App\Repo\Ingredient\IngredientRepository;
use App\Repo\Ingredient\IngredientItemsRepository;
use App\Http\Controllers\API\Ingredient\IngredientController;
use App\Http\Controllers\API\Ingredient\IngredientItemsController;
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
        
          $this->app->when(IngredientItemsController::class)
          ->needs(IngredientInterface::class)
          ->give(IngredientItemsRepository::class);
    }
}
