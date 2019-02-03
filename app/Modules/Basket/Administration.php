<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket;

use App\Modules\Basket\Http\Controllers\Admin\BasketsController;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;

class Administration implements Module {

    public function routes($module) {
        \Route::resource('basket', BasketsController::class);
    }

//    public function dashboard($module) {

//    }

    public function menu($module) {

        \AdministrationMenu::addModule(trans('basket::admin.module_name'), [
            'icon' => 'cubes',
            'url'=> \Administration::route('basket.index'),
        ]);
    }


    /**
     * Init Dashboard boxes.
     *
     * @param $module
     * @return mixed
     */
    public function dashboard($module)
    {
        // TODO: Implement dashboard() method.
    }

    /**
     * Add settings in administration panel
     * @param $module
     * @param Form $form
     * @return mixed
     */
    public function settings($module, Form $form)
    {

        $form->add($module['slug'] . '_fixed_shipping_price', 'text', [
            'label' => trans('shop::admin.fixed_shipping_price'),
            'translate' => false
        ]);

        $form->add($module['slug'] . '_free_shipping_over', 'text', [
            'label' => trans('shop::admin.free_shipping_over'),
            'translate' => false
        ]);

        $form->add($module['slug'] . '_admin_email', 'text', [
            'label' => trans('shop::admin.admin_email'),
            'translate' => false
        ]);


        $form->add($module['slug'].'_header_image', 'file', [
            'label' => trans($module['slug'].'::admin.header_image'),
//            'translate' => true,
            'path' => '/uploads/settings/'.$module['slug'].'_header_image/'
        ]);
    }
}