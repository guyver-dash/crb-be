<?php

namespace App\Policies;

use App\Model\User;
use App\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the company.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function view(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can create companies.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the company.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the company.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function delete(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the company.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function restore(User $user, Company $company)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the company.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Company  $company
     * @return mixed
     */
    public function forceDelete(User $user, Company $company)
    {
        return true;
    }
}
