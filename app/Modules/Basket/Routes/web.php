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
        'prefix' => 'basket',
        'as' => 'basket.'
    ], function () {

        Route::get('/', [
            'as' => 'index',
            'uses' => 'BasketController@index'
        ]);
    });
});

