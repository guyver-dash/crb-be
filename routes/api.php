<?php


Route::post('login', 'Auth\LoginController@login');

Route::group(['prefix' => 'auth', 'middleware' => 'jwt.auth'], function () {
    Route::get('user', 'API\User\UserController@getAuthUser');
    Route::post('logout', 'Auth\LoginController@logout');
});
Route::get('get-subcategories', 'API\Subcategory\SubcategoryController@getSub');
Route::get('get-items', 'API\ItemInfo\ItemInfoController@getItems');
Route::get('get-items/{catName}', 'API\ItemInfo\ItemInfoController@cat');
Route::get('get-items/{catName}/{subName}', 'API\ItemInfo\ItemInfoController@subCat');
Route::get('get-items/{catName}/{subName}/{furthName}', 'API\ItemInfo\ItemInfoController@furtherCat');

Route::get('get-provinces', 'API\Province\ProvinceController@allProvinces');
Route::get('get-countries', 'API\Country\CountryController@allCountries');
Route::get('get-payment-province/{countryId}', 'API\Province\ProvinceController@states');
Route::get('get-payment-cities/{stateId}', 'API\City\CityController@getPaymentCities');
Route::get('get-cities/{provCode}', 'API\City\CityController@getCities');
Route::get('get-brgys/{citymunCode}', 'API\Brgy\BrgyController@getBrgy');
Route::get('get-selected-brgy/{brgyCode}', 'API\Brgy\BrgyController@selectedBrgy');
Route::get('get-subcategories/{category_id}', 'API\Subcategory\SubcategoryController@getSubcategories');
Route::get('get-further-category/{subcategory_id}', 'API\FurtherCategory\FurtherCategoryController@getFurther');
Route::get('get-branches/{storeId}', 'API\Branch\BranchController@getBranches');
Route::get('menu-categories', 'API\Menu\MenuController@categories');
Route::get('search-user', 'API\User\UserController@search');
Route::get('search-category', 'API\Categories\CategoryController@search');
Route::get('search-subcategory', 'API\Subcategory\SubcategoryController@search');
Route::get('search-further-category', 'API\FurtherCategory\FurtherCategoryController@search');
Route::get('search-store', 'API\Store\StoreController@search');
Route::get('search-store-place', 'API\Store\StoreController@searchStorePlace');
Route::get('search-store-include-places', 'API\Store\StoreController@searchStoreIncludePlaces');

Route::post('pay-with-credit-card', 'API\Payment\PaymentController@paywithCreditCard');

Route::resource('roles', 'API\Roles\RoleController');
Route::resource('item_info', 'API\ItemInfo\ItemInfoController');
Route::resource('items', 'API\Items\ItemsController');
Route::resource('categories', 'API\Categories\CategoryController');
Route::resource('subcategories', 'API\Subcategory\SubcategoryController');
Route::resource('further_categories', 'API\FurtherCategory\FurtherCategoryController');
Route::resource('user', 'API\User\UserController');
Route::resource('store', 'API\Store\StoreController');
Route::resource('colors', 'API\Colors\ColorController');
Route::resource('sizes', 'API\Sizes\SizeController');
Route::resource('units', 'API\Units\UnitController');