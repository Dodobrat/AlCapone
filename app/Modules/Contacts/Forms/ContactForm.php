<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Contacts\Forms;

use ProVision\Administration\Forms\AdminForm;

class ContactForm extends AdminForm
{
    public function buildForm()
    {
        $this->add('title', 'text', [
            'label' => trans('contacts::admin.title'),
            'translate' => true

        ]);

        $this->add('description', 'editor', [
            'label' => trans('contacts::admin.description'),
            'translate' => true

        ]);

        $this->add('email', 'text', [
            'label' => trans('contacts::admin.email'),
            'translate' => true
        ]);

        $this->add('address', 'text', [
            'label' => trans('contacts::admin.address'),
            'translate' => true,
        ]);


        $this->add('phone', 'text', [
            'label' => trans('contacts::admin.phone'),
            'translate' => true,
        ]);

        $this->add('skype', 'text', [
            'label' => trans('contacts::admin.skype'),
            'translate' => true,
        ]);

        $this->add('working_time', 'text', [
            'label' => trans('contacts::admin.working_time'),
            'translate' => true
        ]);




        $this->add('visible', 'select', [
            'label' => trans('contacts::admin.status'),
            'choices' => ['1' => trans('contacts::admin.active'), '0' => trans('contacts::admin.inactive')],
            'selected' => @$this->model->visible
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