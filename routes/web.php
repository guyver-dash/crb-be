<?php

Route::get('bank_accounts', function(){

   $bankAccounts =  App\Model\BankAccount::where('id', 1)->first();
    dd($bankAccounts);

});

Route::get('menus', function(){

    $menus = App\Model\Menu::with('allChildren')->first();

    dd($menus);
});

Route::get('user-menu', function(){

    $user = App\Model\User::where('id',1)
        ->whereHas('roles', function($q){
            $q->where('parent_id', 0);
        })->relTable()->first();
    
    $menu = [];
    if($user != null){
        $menu = App\Model\Menu::with('allChildren')->get();
        $menu = $menu->filter(function($item){
            return $item->parent_id === 0;
        });
    }
    
    return $menu;
});