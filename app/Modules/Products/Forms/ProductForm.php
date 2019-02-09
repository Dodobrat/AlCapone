<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Products\Forms;

use App\Modules\Categories\Models\Category;
use App\Modules\Ingredients\Models\Ingredient;
use ProVision\Administration\Forms\AdminForm;

class ProductForm extends AdminForm
{
    public function buildForm()
    {
        $this->add('title', 'text', [
            'label' => trans('products::admin.title'),
            'translate' => true,
        ]);


//        $this->add('author', 'text', [
//            'label' => trans('blog::admin.author'),
//            'translate' => true,
//        ]);

        $this->add('description', 'editor', [
            'label' => trans('products::admin.description'),
            'translate' => true,
        ]);

        $this->addSeoFields();

        $this->add('price', 'text', [
            'label' => trans('products::admin.price'),
        ]);

        $categories = Category::withTrashed()->get()->pluck('title', 'id')->toArray();

        $this->add('category_id', 'select', [
            'label' => trans('products::admin.category_id'),
            'choices' => $categories,
            'selected' => @$this->model->category_id
        ]);

        $ingredients = Ingredient::all()->pluck('title', 'id')->toArray();


        $this->add('ingredients', 'select', [
            'label' => trans('products::admin.ingredients'),
            'choices' => $ingredients,
            'selected' => (!empty($this->model) && !empty($this->model->ingredients)) ? $this->model->ingredients->pluck('id')->toArray() : null,
            'attr' => [
                'multiple' => 'multiple',
                'class' => 'select2',
                'id' => 'categories-exist2',
                'style' => 'width: 100%;'
            ],
//            'empty_value' => trans('products::admin.empty_value'),
        ]);

        $this->add('allergens', 'select', [
            'label' => trans('products::admin.allergens'),
            'choices' => $ingredients,
            'selected' => (!empty($this->model) && !empty($this->model->allergens)) ? $this->model->allergens->pluck('id')->toArray() : null,
            'attr' => [
                'multiple' => 'multiple',
                'class' => 'select2',
                'id' => 'categories-exist3',
                'style' => 'width: 100%;'
            ],
//            'empty_value' => trans('products::admin.empty_value'),
        ]);


        $this->add('visible', 'checkbox', [
            'label' => trans('products::admin.visible'),
            'value' => 1,
            'checked' => @$this->model->visible,
        ]);

        $this->add('special', 'checkbox', [
            'label' => trans('products::admin.special'),
            'value' => 1,
            'checked' => @$this->model->special,
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