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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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

        Gate::define('isAdmin', function ($user) {
            return $user->type === 'admin';
        });
        Gate::define('isAdminOrVendor', function ($user) {
            if ($user->type === 'admin') {
                return true;
            }
            if ($user->type === 'vendor') {
                return true;
            }
            
        });
        Gate::define('isUser', function ($user) {
            return $user->type === 'user';
        });
        Gate::define('isVendor', function ($user) {
            return $user->type === 'vendor';
        });



        //
    }
}
