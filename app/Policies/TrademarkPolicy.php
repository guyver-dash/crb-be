<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Trademark;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrademarkPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the trademark.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Trademark  $trademark
     * @return mixed
     */
    public function view(User $user, Trademark $trademark)
    {
        return true;
    }

    /**
     * Determine whether the user can create trademarks.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the trademark.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Trademark  $trademark
     * @return mixed
     */
    public function update(User $user, Trademark $trademark)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the trademark.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Trademark  $trademark
     * @return mixed
     */
    public function delete(User $user, Trademark $trademark)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the trademark.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Trademark  $trademark
     * @return mixed
     */
    public function restore(User $user, Trademark $trademark)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the trademark.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Trademark  $trademark
     * @return mixed
     */
    public function forceDelete(User $user, Trademark $trademark)
    {
        return true;
    }
}
