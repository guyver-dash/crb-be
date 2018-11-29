<?php

namespace App\Policies;

use App\Model\User;
use App\Model\Menu;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {

       return true;

    }
    /**
     * Determine whether the user can view the menu.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Menu  $menu
     * @return mixed
     */
    public function view(User $user, Menu $menu)
    {
        return true;
    }

    /**
     * Determine whether the user can create menus.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the menu.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Menu  $menu
     * @return mixed
     */
    public function update(User $user, Menu $menu)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the menu.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Menu  $menu
     * @return mixed
     */
    public function delete(User $user, Menu $menu)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the menu.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Menu  $menu
     * @return mixed
     */
    public function restore(User $user, Menu $menu)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the menu.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Menu  $menu
     * @return mixed
     */
    public function forceDelete(User $user, Menu $menu)
    {
        return true;
    }
}
