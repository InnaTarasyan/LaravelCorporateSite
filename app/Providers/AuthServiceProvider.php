<?php

namespace Corp\Providers;

use Corp\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Corp\Article;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // registered Article Policy
       Article::class => ArticlePolicy::class
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

//        Gate::define('save', function ($user) {
//            return $user->canDo('ADD_ARTICLES', true);
//        });

        Gate::define('editPermissions', function($user){
            return $user->canDo('EDIT_USERS', true);
        });

    }
}
