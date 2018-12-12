<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Commissary;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommissaryPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }
    /**
     * Determine whether the user can view the commissary.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Commissary  $commissary
     * @return mixed
     */
    public function view(User $user, Commissary $commissary)
    {
        return true;
    }

    /**
     * Determine whether the user can create commissaries.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the commissary.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Commissary  $commissary
     * @return mixed
     */
    public function update(User $user, Commissary $commissary)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the commissary.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Commissary  $commissary
     * @return mixed
     */
    public function delete(User $user, Commissary $commissary)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the commissary.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Commissary  $commissary
     * @return mixed
     */
    public function restore(User $user, Commissary $commissary)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the commissary.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Commissary  $commissary
     * @return mixed
     */
    public function forceDelete(User $user, Commissary $commissary)
    {
        return true;
    }
}
