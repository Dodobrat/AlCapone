<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Options;

use App\Modules\Options\Http\Controllers\Admin\OptionsController;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;

class Administration implements Module {

    public function routes($module) {
        \Route::resource('options', OptionsController::class);
    }

//    public function dashboard($module) {
//
//    }

    public function menu($module) {

        \AdministrationMenu::addModule(trans('options::admin.module_name'), [
            'icon' => 'star'
        ], function ($menu) {
            $menu->addItem(trans('options::admin.list'), [
                'url' => \Administration::route('options.index'),
                'icon' => 'list'
            ]);

            $menu->addItem(trans('options::admin.add'), [
                'url' => \Administration::route('options.create'),
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