<?php

Route::post('login', 'Auth\LoginController@login');
Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser');

Route::group(['namespace' => 'Auth','prefix' => 'password'], function () {    
    Route::post('create', 'ResetPasswordController@create');
    Route::get('find/{token}', 'ResetPasswordController@find');
    Route::post('reset', 'ResetPasswordController@reset');
});

Route::group(['middleware' => 'auth:api'], function(){

	Route::post('logout', 'Auth\LoginController@logout');
	Route::get('details', 'API\User\UserController@details');

	Route::get('user-holdings', 'API\Holding\HoldingController@userHoldings');
	Route::resource('holdings', 'API\Holding\HoldingController');

	Route::get('user-companies', 'API\Company\CompanyController@userCompanies');
	Route::get('company-holdings', 'API\Company\CompanyController@companyHoldings');
	Route::resource('companies', 'API\Company\CompanyController');

	
	Route::get('user-branches', 'API\Branch\BranchController@userBranches');
	Route::resource('branches', 'API\Branch\BranchController');

	Route::get('user-trademarks', 'API\Trademark\TrademarkController@userTrademarks');
	Route::resource('trademarks', 'API\Trademark\TrademarkController');
	Route::resource('franchisees', 'API\Franchisee\FranchiseeController');


	Route::resource('users', 'API\User\UserController');

	Route::get('user-subordinate-roles', 'API\Roles\RoleController@userSubRoles');
	Route::resource('roles', 'API\Roles\RoleController');

	Route::get('user-sub-menus', 'API\Menu\MenuController@userSubMenus');
	Route::resource('menus', 'API\Menu\MenuController');

	Route::resource('access_rights', 'API\AccessRight\AccessRightController');
	Route::resource('categories', 'API\Category\CategoryController');

	Route::resource('packages', 'API\Packages\PackageController');
	Route::resource('vendors', 'API\Vendor\VendorController');

	Route::get('modelable-address-business-info', 'API\Modelable\ModelableController@addressBusinessInfo');
	Route::get('modelable-user-models', 'API\Modelable\ModelableController@userModels');
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
