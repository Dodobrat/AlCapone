<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

/*
* Public
*/
Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    //'middleware' => \Administration::routeMiddleware()
], function () {
    Route::group([
        'prefix' => 'menu',
        'as' => 'menu.'
    ], function () {

        Route::get('/{slug?}', [
            'as' => 'index',
            'uses' => 'CategoriesController@index'
        ]);

        Route::post('/ajax/getProducts', [
            'as' => 'getProducts',
            'uses' => 'CategoriesController@getProducts'
        ]);
    });
});

