<?php

Route::get('example', function(){

   $role =  App\Model\Role::childLess()->get();
    dd($role);
});

