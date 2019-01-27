<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Options\Forms;

use App\Modules\Categories\Models\Category;
use ProVision\Administration\Forms\AdminForm;

class OptionsForm extends AdminForm
{
    public function buildForm()
    {
        $this->add('title', 'text', [
            'label' => trans('products::admin.title'),
            'translate' => true,
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