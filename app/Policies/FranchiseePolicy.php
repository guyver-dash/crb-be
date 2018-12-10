<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Franchisee;
use Illuminate\Auth\Access\HandlesAuthorization;

class FranchiseePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the franchisee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Franchisee  $franchisee
     * @return mixed
     */
    public function view(User $user, Franchisee $franchisee)
    {
        
        return true;
    }

    /**
     * Determine whether the user can create franchisees.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the franchisee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Franchisee  $franchisee
     * @return mixed
     */
    public function update(User $user, Franchisee $franchisee)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the franchisee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Franchisee  $franchisee
     * @return mixed
     */
    public function delete(User $user, Franchisee $franchisee)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the franchisee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Franchisee  $franchisee
     * @return mixed
     */
    public function restore(User $user, Franchisee $franchisee)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the franchisee.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Franchisee  $franchisee
     * @return mixed
     */
    public function forceDelete(User $user, Franchisee $franchisee)
    {
        return true;
    }
}
