<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Holding;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class HoldingPolicy
{
    use HandlesAuthorization;


    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the holding.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Holding  $holding
     * @return mixed
     */
    public function view(User $user, Holding $holding)
    {

        return true;
    }

    /**
     * Determine whether the user can create holdings.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the holding.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Holding  $holding
     * @return mixed
     */
    public function update(User $user, Holding $holding)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the holding.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Holding  $holding
     * @return mixed
     */
    public function delete(User $user, Holding $holding)
    {
       return true;
    }

    /**
     * Determine whether the user can restore the holding.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Holding  $holding
     * @return mixed
     */
    public function restore(User $user, Holding $holding)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the holding.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Holding  $holding
     * @return mixed
     */
    public function forceDelete(User $user, Holding $holding)
    {
        return true;
    }
}
