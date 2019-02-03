<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Forms;

use App\Modules\Categories\Models\Category;
use ProVision\Administration\Forms\AdminForm;

class BasketForm extends AdminForm
{
    public function buildForm()
    {


        $choices = config('website.basket_statuses');
        $statuses = [];

        foreach ($choices as $choice) {
            $statuses[$choice] = trans('basket::admin.' . $choice);
        }
        $this->add('status', 'select', [
            'label' => trans('basket::admin.status'),
            'choices' => $statuses,
            'selected' => @$this->model->status
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