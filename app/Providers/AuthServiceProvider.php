<?php

namespace Corp\Providers;

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
        'Corp\Model' => 'Corp\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('accessAdminpanel', function ($user) {
            return $user->canDo('VIEW_ADMIN', true);
        });

        Gate::define('accessAdminArticles', function ($user) {
            return $user->canDo('VIEW_ADMIN_ARTICLES', true);
        });


    }
}
