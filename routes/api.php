<?php

Route::post('login', 'Auth\LoginController@login');
// Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('details', 'API\User\UserController@details');
	Route::resource('holdings', 'API\Holding\HoldingController');


	Route::get('company-holdings', 'API\Company\CompanyController@companyHoldings');
	Route::resource('companies', 'API\Company\CompanyController');


	Route::resource('users', 'API\User\UserController');
});

Route::get('search-company', 'API\Company\CompanyController@searchCompany');


Route::resource('roles', 'API\Roles\RoleController');
Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
Route::resource('provinces', 'API\Province\ProvinceController');
Route::resource('cities', 'API\City\CityController');
Route::resource('brgys', 'API\Brgy\BrgyController');
Route::resource('business_types', 'API\BusinessType\BusinessTypeController');
Route::resource('vat_types', 'API\VatType\VatTypeController');