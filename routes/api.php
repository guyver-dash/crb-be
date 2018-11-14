<?php

Route::post('login', 'API\User\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('details', 'API\User\UserController@details');
	Route::resource('holdings', 'API\Holding\HoldingController');

});

// Route::post('login', 'Auth\LoginController@login');

// Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
//     Route::get('user', 'API\User\UserController@getAuthUser');
//     Route::post('logout', 'Auth\LoginController@logout');
// });

Route::resource('roles', 'API\Roles\RoleController');
Route::resource('user', 'API\User\UserController');
Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
Route::resource('provinces', 'API\Province\ProvinceController');
Route::resource('cities', 'API\City\CityController');
Route::resource('brgys', 'API\Brgy\BrgyController');