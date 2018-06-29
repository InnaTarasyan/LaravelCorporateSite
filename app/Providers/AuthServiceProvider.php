<?php

namespace Corp\Providers;

use Corp\Permission;
use Corp\Policies\ArticlePolicy;
use Corp\Policies\PermissionPolicy;
use Corp\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Corp\Article;
use Corp\Menu;
use Corp\Policies\MenuPolicy;
use Corp\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // registered Article Policy
       Article::class => ArticlePolicy::class,
       Permission::class => PermissionPolicy::class,
       Menu::class => MenuPolicy::class,
       User::class => UserPolicy::class
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

        Gate::define('viewAdminMenu', function($user){
           return $user->canDo('VIEW_ADMIN_MENU', true);
        });

        Gate::define('viewUsers', function($user){
            return $user->canDo('ADMIN_USERS', true);
        });

    }
}
