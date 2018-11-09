<?php


Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\User\UserController@getAuthUser');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::resource('roles', 'API\Roles\RoleController');
Route::resource('user', 'API\User\UserController');
Route::resource('holdings', 'API\Holding\HoldingController');
Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
