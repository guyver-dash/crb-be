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
	Route::get('async-holding-form-validation', 'API\Holding\HoldingController@asyncValidation');
	// get random holdings for dropdown
	Route::get('get-random-holdings', 'API\Holding\HoldingController@getRandomHoldings');
	Route::get('get-holdings-by-name/{holding}/{limit}', 'API\Holding\HoldingController@getHoldingsByName');

	Route::get('user-companies', 'API\Company\CompanyController@userCompanies');
	Route::get('company-holdings', 'API\Company\CompanyController@companyHoldings');
	Route::get('async-company-form-validation', 'API\Holding\CompanyController@asyncValidation');
	Route::resource('companies', 'API\Company\CompanyController');

	Route::resource('logistics', 'API\Logistic\LogisticController');
	Route::resource('commissaries', 'API\Commissary\CommissaryController');
	Route::resource('other_businesses', 'API\OtherBusiness\OtherBusinessController');
	Route::resource('other_vendors', 'API\OtherVendor\OtherVendorController');

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
	Route::get('packages-all', 'API\Packages\PackageController@all');

	Route::get('vendorables-count', 'API\Vendors\VendorableController@vendorablesCount');
	Route::resource('vendorables', 'API\Vendors\VendorableController');
	Route::resource('items', 'API\Item\ItemController');
	Route::resource('vendors', 'API\Vendor\VendorController');

	Route::get('purchases-approved-by', 'API\Purchase\PurchaseController@approvedBy');
	Route::get('purchases-noted-by', 'API\Purchase\PurchaseController@notedBy');
	Route::resource('purchases', 'API\Purchase\PurchaseController');
	Route::resource('purchase_items', 'API\Purchase\PurchaseItemsController');

	Route::resource('ingredients', 'API\Ingredient\IngredientController');
	Route::resource('ingredient_items', 'API\Ingredient\IngredientItemsController');

	Route::resource('accounting_standards', 'API\AccountingStandard\AccountingStandardController');
	Route::get('chart-account-search', 'API\ChartAccount\ChartAccountController@search');
	Route::get('chart-account-companies', 'API\ChartAccount\ChartAccountController@companies');
	Route::get('taccounts', 'API\TAccount\TAccountController@index');
	Route::resource('chart_account', 'API\ChartAccount\ChartAccountController');

	Route::get('transaction-type-companies', 'API\TransactionType\TransactionTypeController@companies');
	Route::resource('transaction_types', 'API\TransactionType\TransactionTypeController');

	Route::get('transactions-get-purchase', 'API\Transaction\TransactionController@purchases');
	Route::get('transactions-get-transaction-type', 'API\Transaction\TransactionController@transactionType');
	Route::get('transactions-transactable', 'API\Transaction\TransactionController@transactable');
	Route::get('transactions-entities', 'API\Transaction\TransactionController@entities');
	Route::resource('transactions', 'API\Transaction\TransactionController');
	Route::resource('general_ledgers', 'API\GeneralLedger\GeneralLedgerController');

	Route::get('modelable-address-business-info', 'API\Modelable\ModelableController@addressBusinessInfo');
	Route::get('modelable-user-models', 'API\Modelable\ModelableController@userModels');
	Route::get('modelable-selected-item', 'API\Modelable\ModelableController@selectedItem');
	Route::get('modelable-chart-account', 'API\Modelable\ModelableController@chartAccount');
	Route::get('modelable-user-model-id', 'API\Modelable\ModelableController@userModelId');
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
