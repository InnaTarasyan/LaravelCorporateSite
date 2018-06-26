<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'IndexController',
                       ['only' => ['index'],
                        'names' => [
                            'index' => 'home']
                       ]);


Route::resource('portfolios', 'PortfolioController', [
    'parameters' => [
        'portfolios' => 'alias'
    ]
]);

Route::resource('articles', 'ArticlesController', [
    'parameters' => [
        'articles' => 'alias'
    ]
]);

Route::get('articles/cat/{cat_alias?}',['uses'=>'ArticlesController@index','as'=>'articlesCat'])->where('cat_alias','[\w-]+');

Route::resource('comment', 'CommentController', ['only' => ['store']]);

Route::match(['get', 'post'], '/contacts', ['uses' => 'ContactsController@index', 'as' => 'contacts']);

    Route::auth();
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


// for the version of laravel 5.6 we have to add  'can:accessAdminpanel' middleware
Route::group(['middleware' => 'can:accessAdminpanel'], function() {
//admin
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

        //admin
        Route::get('/', ['uses' => 'Admin\IndexController@index', 'as' => 'adminIndex']);

        Route::group(['middleware' => 'can:accessAdminArticles'], function() {
            // articles
            Route::resource('/articles', 'Admin\ArticlesController', ['as' => 'admin']);
        });

        Route::group(['middleware' => 'can:editPermissions'], function() {
            Route::resource('/permissions', 'Admin\PermissionsController', ['as' => 'admin']);
        });

        Route::group(['middleware' => 'can:viewAdminMenu'], function() {
            Route::resource('/menus', 'Admin\MenusController', ['as' => 'admin']);
        });

    });
});

// php artisan route:list