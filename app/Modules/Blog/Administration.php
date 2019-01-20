<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Blog;

use App\Modules\Blog\Http\Controllers\Admin\BlogCategoriesController;
use App\Modules\Blog\Http\Controllers\Admin\BlogController;
use App\Modules\Blog\Models\Blog;
use Kris\LaravelFormBuilder\Form;
use ProVision\Administration\Contracts\Module;
use ProVision\Administration\Dashboard\LinkBox;

class Administration implements Module {

    public function routes($module) {
        \Route::resource('blog', BlogController::class);
    }

    public function menu($module) {

        \AdministrationMenu::addModule(trans('blog::admin.module_name'), [
            'icon' => 'newspaper-o'
        ], function ($menu) {

            $menu->addItem(trans('blog::admin.list'), [
                'url' => \Administration::route('blog.index'),
                'icon' => 'list'
            ]);

            $menu->addItem(trans('blog::admin.add'), [
                'url' => \Administration::route('blog.create'),
                'icon' => 'plus'
            ]);

        });
    }


    /**
     * Init Dashboard boxes.
     *
     * @param $module
     *
     * @return mixed
     */
    public function dashboard($module) {

        $box = new LinkBox();
        $box->setTitle(trans('blog::admin.module_name'));
        $box->setValue(Blog::count());
        $box->setBoxBackgroundClass('bg-orange');
        $box->setIconClass('fa-newspaper-o');
        $box->setLink(trans('blog::admin.view_all'), \Administration::route('blog.index'));
        \Dashboard::add($box);
    }

    /**
     * Add settings in administration panel
     *
     * @param      $module
     * @param Form $form
     *
     * @return mixed
     */
    public function settings($module, Form $form) {

        $form->add($module['slug'] . '_title', 'text', [
            'label' => trans($module['slug'] . '::admin.title'),
            'translate' => true
        ]);

        $form->add($module['slug'] . '_meta_title', 'text', [
            'label' => trans('administration::index.meta_title'),
            'translate' => true,
            'attr' => [
                'data-maxlength' => 70,
                'data-minlength' => 35,
            ]
        ]);

        $form->add($module['slug'] . '_meta_keywords', 'text', [
            'label' => trans('administration::index.meta_keywords'),
            'translate' => true,
        ]);

        $form->add($module['slug'] . '_meta_description', 'text', [
            'label' => trans('administration::index.meta_description'),
            'translate' => true,
            'attr' => [
                'data-maxlength' => 160,
                'data-minlength' => 80,
            ]
        ]);

        $form->add($module['slug'].'_header_image', 'file', [
            'label' => trans($module['slug'].'::admin.header_image'),
            //            'translate' => true,
            'path' => '/uploads/settings/'.$module['slug'].'_header_image/'
        ]);

    }
}