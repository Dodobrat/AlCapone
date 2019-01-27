<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Products;

use App\Modules\Products\Http\Controllers\Admin\ProductsController;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;

class Administration implements Module {

    public function routes($module) {
        \Route::resource('products', ProductsController::class);
    }

//    public function dashboard($module) {
//
//    }

    public function menu($module) {

        \AdministrationMenu::addModule(trans('products::admin.module_name'), [
            'icon' => 'star'
        ], function ($menu) {
            $menu->addItem(trans('products::admin.list'), [
                'url' => \Administration::route('products.index'),
                'icon' => 'list'
            ]);

            $menu->addItem(trans('products::admin.add'), [
                'url' => \Administration::route('products.create'),
                'icon' => 'plus'
            ]);
        });
    }


    /**
     * Init Dashboard boxes.
     *
     * @param $module
     * @return mixed
     */
    public function dashboard($module) {
        // TODO: Implement dashboard() method.
    }

    /**
     * Add settings in administration panel
     * @param $module
     * @param Form $form
     * @return mixed
     */
    public function settings($module, Form $form) {

    }
}