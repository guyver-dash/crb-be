<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Branch;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }
    /**
     * Determine whether the user can view the branch.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Branch  $branch
     * @return mixed
     */
    public function view(User $user, Branch $branch)
    {
        return true;
    }

    /**
     * Determine whether the user can create branches.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the branch.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Branch  $branch
     * @return mixed
     */
    public function update(User $user, Branch $branch)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the branch.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Branch  $branch
     * @return mixed
     */
    public function delete(User $user, Branch $branch)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the branch.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Branch  $branch
     * @return mixed
     */
    public function restore(User $user, Branch $branch)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the branch.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Branch  $branch
     * @return mixed
     */
    public function forceDelete(User $user, Branch $branch)
    {
        return true;
    }
}
