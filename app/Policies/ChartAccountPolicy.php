<?php

namespace App\Policies;

use App\Model\User;
use App\Model\ChartAccount;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChartAccountPolicy
{
    use HandlesAuthorization;


    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the chart account.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\ChartAccount  $chartAccount
     * @return mixed
     */
    public function view(User $user, ChartAccount $chartAccount)
    {
         return true;
    }

    /**
     * Determine whether the user can create chart accounts.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the chart account.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\ChartAccount  $chartAccount
     * @return mixed
     */
    public function update(User $user, ChartAccount $chartAccount)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the chart account.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\ChartAccount  $chartAccount
     * @return mixed
     */
    public function delete(User $user, ChartAccount $chartAccount)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the chart account.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\ChartAccount  $chartAccount
     * @return mixed
     */
    public function restore(User $user, ChartAccount $chartAccount)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the chart account.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\ChartAccount  $chartAccount
     * @return mixed
     */
    public function forceDelete(User $user, ChartAccount $chartAccount)
    {
        return true;
    }
}
