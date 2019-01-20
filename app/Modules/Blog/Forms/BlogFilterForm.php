<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Blog\Forms;


use ProVision\Administration\Forms\AdminForm;

class BlogFilterForm extends AdminForm {

    public function buildForm() {

        $this->add('title', 'text', [
            'label' => trans('blog::admin.title'),
            'wrapper' => ['class' => 'form-group col-lg-2 col-md-3']
        ]);

    }


}