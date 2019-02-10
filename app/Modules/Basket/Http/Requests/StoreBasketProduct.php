<?php

namespace App\Modules\Basket\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBasketProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'product_option_id' => 'integer|exists:products_options,id,product_id,' . $this->input('product_id'),
            'quantity' => 'integer|max:10'
        ];
    }
}
