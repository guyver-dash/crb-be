<?php

namespace App\Policies;

use App\Model\User;
use App\Model\AccountingStandard;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountingStandardPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }
    /**
     * Determine whether the user can view the accounting standard.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccountingStandard  $accountingStandard
     * @return mixed
     */
    public function view(User $user, AccountingStandard $accountingStandard)
    {
        return true;
    }

    /**
     * Determine whether the user can create accounting standards.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the accounting standard.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccountingStandard  $accountingStandard
     * @return mixed
     */
    public function update(User $user, AccountingStandard $accountingStandard)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the accounting standard.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccountingStandard  $accountingStandard
     * @return mixed
     */
    public function delete(User $user, AccountingStandard $accountingStandard)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the accounting standard.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccountingStandard  $accountingStandard
     * @return mixed
     */
    public function restore(User $user, AccountingStandard $accountingStandard)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the accounting standard.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\AccountingStandard  $accountingStandard
     * @return mixed
     */
    public function forceDelete(User $user, AccountingStandard $accountingStandard)
    {
        return true;
    }
}
