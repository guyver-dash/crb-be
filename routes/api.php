<?php

Route::post('login', 'Auth\LoginController@login');
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser');

Route::group(['middleware' => 'auth:api'], function(){

	Route::post('logout', 'Auth\LoginController@logout');
	Route::get('details', 'API\User\UserController@details');

	Route::resource('holdings', 'API\Holding\HoldingController');

	Route::get('company-holdings', 'API\Company\CompanyController@companyHoldings');
	Route::resource('companies', 'API\Company\CompanyController');

	Route::get('user-companies', 'API\Branch\BranchController@userCompanies');
	Route::resource('branches', 'API\Branch\BranchController');

	Route::resource('users', 'API\User\UserController');

	Route::get('user-subordinate-roles', 'API\Roles\RoleController@userSubRoles');
	Route::resource('roles', 'API\Roles\RoleController');

	Route::get('user-sub-menus', 'API\Menu\MenuController@userSubMenus');
	Route::resource('menus', 'API\Menu\MenuController');

	Route::resource('access_rights', 'API\AccessRight\AccessRightController');


});


Route::resource('countries', 'API\Country\CountryController');
Route::resource('regions', 'API\Region\RegionController');
Route::resource('provinces', 'API\Province\ProvinceController');
Route::resource('cities', 'API\City\CityController');
Route::resource('brgys', 'API\Brgy\BrgyController');
Route::resource('business_types', 'API\BusinessType\BusinessTypeController');
Route::resource('vat_types', 'API\VatType\VatTypeController');
Route::resource('civil_status', 'API\CivilStatus\CivilStatusController');
Route::resource('genders', 'API\Gender\GenderController');

Route::get('barangays', 'Api\Location\LocationController@getSampleBarangays');
Route::get('barangays/{barangay}/{limit}', 'Api\Location\LocationController@getBarangayByName');
Route::get('barangay-by-city/{cityId}', 'Api\Location\LocationController@getBarangayByCityId');
Route::get('cities-by-name/{city}/{limit}', 'Api\Location\LocationController@getCitiesByName');
