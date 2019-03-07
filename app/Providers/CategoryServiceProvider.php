<?php

namespace App\Providers;

use App\Http\Controllers\Api\Category\CategoryController;
use App\Http\Controllers\Api\Category\DashboardCategoryController;
use App\Repo\Category\CategoryInterface;
use App\Repo\Category\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
        $this->app->when(CategoryController::class)
            ->needs(CategoryInterface::class)
            ->give(CategoryRepository::class);

        $this->app->when(DashboardCategoryController::class)
            ->needs(CategoryInterface::class)
            ->give(CategoryRepository::class);
    }
}
