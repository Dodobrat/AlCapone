<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Ingredients;

use App\Modules\Ingredients\Http\Controllers\Admin\IngredientsController;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;

class Administration implements Module {

    public function routes($module) {
        \Route::resource('ingredients', IngredientsController::class);
    }

//    public function dashboard($module) {
//
//    }

    public function menu($module) {

        \AdministrationMenu::addModule(trans('ingredients::admin.module_name'), [
            'icon' => 'cart-arrow-down'
        ], function ($menu) {
            $menu->addItem(trans('ingredients::admin.list'), [
                'url' => \Administration::route('ingredients.index'),
                'icon' => 'list'
            ]);

            $menu->addItem(trans('ingredients::admin.add'), [
                'url' => \Administration::route('ingredients.create'),
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