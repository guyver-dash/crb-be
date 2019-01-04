<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Ingredient;
use Illuminate\Auth\Access\HandlesAuthorization;

class IngredientPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the ingredient.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Ingredient  $ingredient
     * @return mixed
     */
    public function view(User $user, Ingredient $ingredient)
    {
         return true;
    }

    /**
     * Determine whether the user can create ingredients.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the ingredient.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Ingredient  $ingredient
     * @return mixed
     */
    public function update(User $user, Ingredient $ingredient)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the ingredient.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Ingredient  $ingredient
     * @return mixed
     */
    public function delete(User $user, Ingredient $ingredient)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the ingredient.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Ingredient  $ingredient
     * @return mixed
     */
    public function restore(User $user, Ingredient $ingredient)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the ingredient.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Ingredient  $ingredient
     * @return mixed
     */
    public function forceDelete(User $user, Ingredient $ingredient)
    {
        return true;
    }
}
