<?php

namespace App\Policies;

use App\Model\User;
use App\Model\AccessRight;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccessRightPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the access right.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccessRight  $accessRight
     * @return mixed
     */
    public function view(User $user, AccessRight $accessRight)
    {
         return true;
    }

    /**
     * Determine whether the user can create access rights.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the access right.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccessRight  $accessRight
     * @return mixed
     */
    public function update(User $user, AccessRight $accessRight)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the access right.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccessRight  $accessRight
     * @return mixed
     */
    public function delete(User $user, AccessRight $accessRight)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the access right.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccessRight  $accessRight
     * @return mixed
     */
    public function restore(User $user, AccessRight $accessRight)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the access right.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccessRight  $accessRight
     * @return mixed
     */
    public function forceDelete(User $user, AccessRight $accessRight)
    {
        return true;
    }
}
