<?php

Route::post('login', 'Auth\LoginController@login');
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser');
// Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('details', 'API\User\UserController@details');
	Route::resource('holdings', 'API\Holding\HoldingController');


	Route::get('company-holdings', 'API\Company\CompanyController@companyHoldings');
	Route::resource('companies', 'API\Company\CompanyController');


	Route::resource('users', 'API\User\UserController');

	Route::get('user-subordinate-roles', 'API\Roles\RoleController@userSubRoles');
	Route::resource('roles', 'API\Roles\RoleController');

});

Route::get('search-company', 'API\Company\CompanyController@searchCompany');
Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
Route::resource('provinces', 'API\Province\ProvinceController');
Route::resource('cities', 'API\City\CityController');
Route::resource('brgys', 'API\Brgy\BrgyController');
Route::resource('business_types', 'API\BusinessType\BusinessTypeController');
Route::resource('vat_types', 'API\VatType\VatTypeController');
Route::resource('civil_status', 'API\CivilStatus\CivilStatusController');
Route::resource('genders', 'API\Gender\GenderController');