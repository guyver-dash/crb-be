<?php
Route::get('bank_accounts', function(){

   $bankAccounts =  App\Model\BankAccount::where('id', 1)->first();
    dd($bankAccounts);

});

Route::get('classes', function(){

    dd(str_replace('0.', '', microtime() . uniqid(true)));

    $menus = App\Model\Branch::find(1)->classs()->with('allChildren')->get();

    dd($menus);
});

Route::get('branch-items', function(){

    $items = App\Model\Logistic::where('id', 3)->with('items.logistics')->get();

    dd($items);
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

Route::get('/', function(){
    return 'asdf';
});