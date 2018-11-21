<?php

Route::get('example', function(){

   $role =  App\Model\Role::with('allChildrenRoles')->first();
    dd($role);
});

Route::get('menus', function(){

    $menus = App\Model\Menu::with('allChildren')->first();

    dd($menus);
});

Route::get('user-menu', function(){

    $user = App\Model\User::where('id', 1)
    ->relTable()
    ->first();

    dd($user);
});