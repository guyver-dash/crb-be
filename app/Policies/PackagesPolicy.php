<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Package;
use Illuminate\Auth\Access\HandlesAuthorization;

class PackagesPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the package.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Package  $package
     * @return mixed
     */
    public function view(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can create packages.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the package.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Package  $package
     * @return mixed
     */
    public function update(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the package.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Package  $package
     * @return mixed
     */
    public function delete(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the package.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Package  $package
     * @return mixed
     */
    public function restore(User $user, Package $package)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the package.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Package  $package
     * @return mixed
     */
    public function forceDelete(User $user, Package $package)
    {
        return true;
    }
}
