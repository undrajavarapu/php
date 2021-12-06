<?php

namespace App\Providers;

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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    public static $permissions = [
        'dashboard' => ['manager', 'cutomer'],
        'list,profile,upload' => ['manager', 'customer'],
        'create-product' => ['manager'],
        'store-product' => ['manager'],
        'edit-product' => ['manager'],
        'update-product' => ['manager'],
        'destroy-product' => ['manager'],
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       // $this->registerPolicies();
        $this->registerPolicies();

        // Roles based authorization
    Gate::before(
        function ($user, $ability) {
            if ($user->role === 'admin') {
                return true;
            }
        }
    );

    foreach (self::$permissions as $action=> $roles) {
        Gate::define(
            $action,
            function (User $user) use ($roles) {
                if (in_array($user->role, $roles)) {
                    return true;
                }
            }
        );
    }

        //
    }
}
