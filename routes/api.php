<?php

Route::post('login', 'API\User\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('details', 'API\User\UserController@details');
	Route::resource('holdings', 'API\Holding\HoldingController');
});
Route::resource('companies', 'API\Company\CompanyController');
Route::resource('roles', 'API\Roles\RoleController');
Route::resource('user', 'API\User\UserController');
Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
Route::resource('provinces', 'API\Province\ProvinceController');
Route::resource('cities', 'API\City\CityController');
Route::resource('brgys', 'API\Brgy\BrgyController');
Route::resource('business_types', 'API\BusinessType\BusinessTypeController');
Route::resource('vat_types', 'API\VatType\VatTypeController');