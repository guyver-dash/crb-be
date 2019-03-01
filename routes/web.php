

<?php

use App\Model\Transaction;
Route::get('bank_accounts', function(){

   $bankAccounts =  App\Model\BankAccount::where('id', 1)->first();
    dd($bankAccounts);

});
Route::get('jobs', function(){

   $jobs = App\Model\Branch::where('id', 1)->with('jobs')->get();

    dd($jobs);
});
Route::get('classes', function(){

    dd(str_replace('0.', '', microtime() . uniqid(true)));

    $menus = App\Model\Branch::find(1)->classs()->with('allChildren')->get();

    dd($menus);
});

Route::get('/sale-invoices', function(){
    Transaction::find(2)->saleInvoices()->attach(2, [
        'amount_due' => 644,
        'amount_paid' =>  644,
        'date_due' => "1993-02-03",
        'description' => "",
        'discount' => 91,
        'id' =>  1,
        'pay' => true,
        'sale_invoice_id' => 2,
        'vat_amount' =>  0,
        'vat_exempt_sales' => 5154,
        'vatable_sales' => 0,
        'zero_rated_sales' => 906
        ]);
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