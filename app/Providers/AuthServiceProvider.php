<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        Gate::define('not_admin', function ($user) {

            return $user->role === 2;
        });

        Gate::define('is_admin', function ($user) {

            return $user->role === 2;
        });

        Gate::define('is_seller', function ($user) {

            return $user->role === 3;
        });

        $this->registerPolicies();

        //
    }
}
