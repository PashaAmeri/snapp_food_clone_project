<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Restaurant;
use App\Policies\AddressPolicy;
use App\Policies\User\CartPolicy;
use App\Policies\Users\CommentPolicy;
use Faker\Provider\it_CH\Address;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Address::class => AddressPolicy::class,
        Cart::class => CartPolicy::class,
        Comment::class => CommentPolicy::class
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

            return $user->role === 2 or $user->role === 1;
        });

        Gate::define('is_seller', function ($user) {

            return $user->role === 3;
        });

        Gate::define('is_guest', function () {

            return !(auth()->check());
        });

        $this->registerPolicies();
    }
}
