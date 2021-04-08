<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('usir_customer', function (User $user) {
            $roles = $user->role;
            if($roles == "Customer"){
                return true;
            }
            return false;
        });
        Gate::define('usir_petugas', function (User $user) {
            $roles = $user->role;
            if($roles == "Petugas"){
                return true;
            }
            return false;
        });
        Gate::define('usir_owner', function (User $user) {
            $roles = $user->role;
            if($roles == "Owner"){
                return true;
            }
            return false;
        });
    }
}
