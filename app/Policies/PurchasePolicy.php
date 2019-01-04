<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Purchase;
use Illuminate\Auth\Access\HandlesAuthorization;

class PurchasePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the purchase.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Purchase  $purchase
     * @return mixed
     */
    public function view(User $user, Purchase $purchase)
    {
         return true;
    }

    /**
     * Determine whether the user can create purchases.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the purchase.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Purchase  $purchase
     * @return mixed
     */
    public function update(User $user, Purchase $purchase)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the purchase.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Purchase  $purchase
     * @return mixed
     */
    public function delete(User $user, Purchase $purchase)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the purchase.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Purchase  $purchase
     * @return mixed
     */
    public function restore(User $user, Purchase $purchase)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the purchase.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Purchase  $purchase
     * @return mixed
     */
    public function forceDelete(User $user, Purchase $purchase)
    {
        return true;
    }
}
