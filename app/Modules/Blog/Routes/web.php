<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    //'middleware' => \Administration::routeMiddleware()
], function () {
    Route::group([
        'prefix' => 'blog',
        'as' => 'blog.'
    ], function () {


        Route::get('/{slug}', [
            'as' => 'view',
            'uses' => 'BlogController@view'
        ]);

        Route::get('/', [
            'as' => 'index',
            'uses' => 'BlogController@index'
        ]);
    });
});
