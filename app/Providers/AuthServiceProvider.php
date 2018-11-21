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
        'App\Model\Holding' => 'App\Policies\HoldingPolicy',
        'App\Model\Company' => 'App\Policies\CompanyPolicy'
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
        Gate::resource('holdings', 'App\Policies\HoldingPolicy');
        Gate::resource('companies', 'App\Policies\CompanyPolicy');

    }
}
