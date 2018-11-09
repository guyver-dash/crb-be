<?php


Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\User\UserController@getAuthUser');
    Route::post('logout', 'Auth\LoginController@logout');
});

Route::get('get-provinces', 'API\Province\ProvinceController@allProvinces');
Route::get('get-cities/{provCode}', 'API\City\CityController@getCities');
Route::get('get-brgys/{citymunCode}', 'API\Brgy\BrgyController@getBrgy');
Route::get('get-branches/{storeId}', 'API\Branch\BranchController@getBranches');
Route::get('search-user', 'API\User\UserController@search');

Route::resource('roles', 'API\Roles\RoleController');
Route::resource('user', 'API\User\UserController');
Route::resource('holdings', 'API\Holding\HoldingController');
Route::resource('countries', 'API\Country\CountryController');
