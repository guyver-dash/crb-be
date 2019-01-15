<?php

namespace App\Policies;

use App\Model\User;
use App\Model\TransactionType;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionTypePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }

    /**
     * Determine whether the user can view the transaction type.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\TransactionType  $transactionType
     * @return mixed
     */
    public function view(User $user, TransactionType $transactionType)
    {
         return true;
    }

    /**
     * Determine whether the user can create transaction types.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the transaction type.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\TransactionType  $transactionType
     * @return mixed
     */
    public function update(User $user, TransactionType $transactionType)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the transaction type.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\TransactionType  $transactionType
     * @return mixed
     */
    public function delete(User $user, TransactionType $transactionType)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the transaction type.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\TransactionType  $transactionType
     * @return mixed
     */
    public function restore(User $user, TransactionType $transactionType)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the transaction type.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\TransactionType  $transactionType
     * @return mixed
     */
    public function forceDelete(User $user, TransactionType $transactionType)
    {
        return true;
    }
}
