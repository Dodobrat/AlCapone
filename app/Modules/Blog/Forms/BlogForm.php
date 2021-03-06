<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

/*
 * ProVision Administration, http://ProVision.bg
 * Author: Venelin Iliev, http://veneliniliev.com
 */

namespace App\Modules\Blog\Forms;

use App\Modules\Blog\Models\Blog;
use App\Modules\Blog\Models\BlogCategories;
use ProVision\Administration\Forms\AdminForm;

class BlogForm extends AdminForm {
    public function buildForm() {
        $this->add('title', 'text', [
            'label' => trans('blog::admin.title'),
            'translate' => true,
        ]);


        $this->add('author', 'text', [
            'label' => trans('blog::admin.author'),
            'translate' => true,
        ]);

        $this->add('description', 'editor', [
            'label' => trans('blog::admin.description'),
            'translate' => true,
        ]);

        $this->addSeoFields();


        $this->add('visible', 'checkbox', [
            'label' => trans('blog::admin.visible'),
            'value' => 1,
            'checked' => @$this->model->visible,
        ]);

//        $this->add('show_media', 'checkbox', [
//            'label' => trans('blog::admin.show_media'),
//            'value' => 1,
//            'checked' => @$this->model->show_media,
//        ]);



        $this->add('footer', 'admin_footer');
        $this->add('send', 'submit', [
            'label' => trans('administration::index.save'),
            'attr' => [
                'name' => 'save',
            ],
        ]);
    }
}