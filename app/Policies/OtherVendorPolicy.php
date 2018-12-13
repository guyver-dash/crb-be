<?php

namespace App\Policies;

use App\Model\User;
use App\Model\OtherVendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class OtherVendorPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the other vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\OtherVendor  $otherVendor
     * @return mixed
     */
    public function view(User $user, OtherVendor $otherVendor)
    {
        return true;
    }

    /**
     * Determine whether the user can create other vendors.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the other vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\OtherVendor  $otherVendor
     * @return mixed
     */
    public function update(User $user, OtherVendor $otherVendor)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the other vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\OtherVendor  $otherVendor
     * @return mixed
     */
    public function delete(User $user, OtherVendor $otherVendor)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the other vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\OtherVendor  $otherVendor
     * @return mixed
     */
    public function restore(User $user, OtherVendor $otherVendor)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the other vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\OtherVendor  $otherVendor
     * @return mixed
     */
    public function forceDelete(User $user, OtherVendor $otherVendor)
    {
        return true;
    }
}
