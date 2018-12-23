<?php

namespace App\Providers;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model\Category' => 'App\Policies\CategoryPolicy',
        'App\Model\Branch' => 'App\Policies\BranchPolicy',
        'App\Model\AccessRight' => 'App\Policies\AccessRightPolicy',
        'App\Model\Holding' => 'App\Policies\HoldingPolicy',
        'App\Model\Company' => 'App\Policies\CompanyPolicy',
        'App\Model\User' => 'App\Policies\UserPolicy',
        'App\Model\Role' => 'App\Policies\RolePolicy',
        'App\Model\Menu' => 'App\Policies\MenuPolicy',
        'App\Model\Trademark' => 'App\Policies\TrademarkPolicy',
        'App\Model\Franchisee' => 'App\Policies\FranchiseePolicy',
        'App\Model\Logistic' => 'App\Policies\LogisticPolicy',
        'App\Model\Commissary' => 'App\Policies\CommissaryPolicy',
        'App\Model\OtherVendor' => 'App\Policies\OtherVendorPolicy',
        'App\Model\Item' => 'App\Policies\ItemPolicy',
        'App\Model\Vendor' => 'App\Policies\VendorPolicy',
        'App\Model\Purchase' => 'App\Policies\PurchasePolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::resource('roles', 'App\Policies\RolePolicy');
        Gate::resource('menus', 'App\Policies\MenuPolicy');
        Gate::resource('access_rights', 'App\Policies\AccessRightPolicy');
        Gate::resource('holdings', 'App\Policies\HoldingPolicy');
        Gate::resource('companies', 'App\Policies\CompanyPolicy');
        Gate::resource('branches', 'App\Policies\BranchPolicy');
        Gate::resource('categories', 'App\Policies\CategoryPolicy');
        Gate::resource('trademarks', 'App\Policies\TrademarkPolicy');
        Gate::resource('franchisees', 'App\Policies\FranchiseePolicy');
        Gate::resource('logistics', 'App\Policies\LogisticPolicy');
        Gate::resource('commissaries', 'App\Policies\CommissaryPolicy');
        Gate::resource('other_vendors', 'App\Policies\OtherVendorPolicy');
        Gate::resource('items', 'App\Policies\ItemPolicy');
        Gate::resource('vendors', 'App\Policies\VendorPolicy');
        Gate::resource('purchases', 'App\Policies\PurchasePolicy');
    }
}
