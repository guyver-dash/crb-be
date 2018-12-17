<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Item;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }
    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function view(User $user, Item $item)
    {
        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function update(User $user, Item $item)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function delete(User $user, Item $item)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the item.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function restore(User $user, Item $item)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the item.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Item  $item
     * @return mixed
     */
    public function forceDelete(User $user, Item $item)
    {
        return true;
    }
}
