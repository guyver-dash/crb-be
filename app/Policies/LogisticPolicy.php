<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Logistic;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogisticPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the logistic.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Logistic  $logistic
     * @return mixed
     */
    public function view(User $user, Logistic $logistic)
    {
        return true;
    }

    /**
     * Determine whether the user can create logistics.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the logistic.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Logistic  $logistic
     * @return mixed
     */
    public function update(User $user, Logistic $logistic)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the logistic.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Logistic  $logistic
     * @return mixed
     */
    public function delete(User $user, Logistic $logistic)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the logistic.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Logistic  $logistic
     * @return mixed
     */
    public function restore(User $user, Logistic $logistic)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the logistic.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Logistic  $logistic
     * @return mixed
     */
    public function forceDelete(User $user, Logistic $logistic)
    {
        return true;
    }
}
