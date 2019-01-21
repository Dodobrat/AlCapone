<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Index;

use App\Modules\Index\Dashboard\GraphBox;
use App\Modules\Offers\Models\Offers;

use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;


class Administration implements Module {

    public function routes($module) {

    }

//    public function dashboard($module) {
//        $box = new \ProVision\Administration\Dashboard\RecentListBox();
//        $box->setTitle('Последни влизания от Google');
//        $box->addItem('test', false, 'Описание', 1200, 'https://almsaeedstudio.com/themes/AdminLTE/dist/img/default-50x50.gif');
//        $box->addItem('test', false, 'Описание', 1200, 'https://almsaeedstudio.com/themes/AdminLTE/dist/img/default-50x50.gif');
//        $box->addItem('test', false, 'Описание', 1200, 'https://almsaeedstudio.com/themes/AdminLTE/dist/img/default-50x50.gif');
//        $box->setFooterButton('View all', '#');
//        \ProVision\Administration\Dashboard::add($box);
//    }

    public function menu($module) {

    }


    /**
     * Init Dashboard boxes.
     *
     * @param $module
     * @return mixed
     */
    public function dashboard($module)
    {

    }

    /**
     * Add settings in administration panel
     * @param $module
     * @param Form $form
     * @return mixed
     */
    public function settings($module, Form $form)
    {

    }
}