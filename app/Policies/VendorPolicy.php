<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Vendor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendorPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Vendor  $vendor
     * @return mixed
     */
    public function view(User $user, Vendor $vendor)
    {
        //
    }

    /**
     * Determine whether the user can create vendors.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Vendor  $vendor
     * @return mixed
     */
    public function update(User $user, Vendor $vendor)
    {
        //
    }

    /**
     * Determine whether the user can delete the vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Vendor  $vendor
     * @return mixed
     */
    public function delete(User $user, Vendor $vendor)
    {
        //
    }

    /**
     * Determine whether the user can restore the vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Vendor  $vendor
     * @return mixed
     */
    public function restore(User $user, Vendor $vendor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the vendor.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Vendor  $vendor
     * @return mixed
     */
    public function forceDelete(User $user, Vendor $vendor)
    {
        //
    }
}
