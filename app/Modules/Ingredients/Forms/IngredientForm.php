<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Ingredients\Forms;

use App\Modules\Categories\Models\Category;
use ProVision\Administration\Forms\AdminForm;

class IngredientForm extends AdminForm
{
    public function buildForm()
    {
        $this->add('title', 'text', [
            'label' => trans('products::admin.title'),
            'translate' => true,
        ]);

        $this->add('visible', 'checkbox', [
            'label' => trans('products::admin.visible'),
            'value' => 1,
            'checked' => @$this->model->visible,
        ]);



        $this->add('footer', 'admin_footer');
        $this->add('send', 'submit', [
            'label' => trans('administration::index.save'),
            'attr' => [
                'name' => 'save'
            ]
        ]);

    }
}