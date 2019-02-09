<?php

namespace App\Modules\Products\Http\Requests;

use App\Modules\Products\Models\ProductTranslation;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
    public function rules()
    {
        $locales = config('translatable.locales');

        $trans = [];

        foreach ($locales as $locale) {
            $trans[$locale . '.title'] = 'required|string';
            $trans[$locale . '.meta_title'] = 'nullable|string';
            $trans[$locale . '.meta_description'] = 'nullable|string';
            $trans[$locale . '.meta_keywords'] = 'nullable|string';
            $trans[$locale . '.description'] = 'nullable|string';

            if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
                $locale_alb = ProductTranslation::where('product_id', $this->route('product'))->where('locale', $locale)->first();
                if($this->has($locale.'.title') && !empty($locale_alb)) {
                    $trans[$locale . '.slug'] = 'nullable|string|unique:products_translations,slug,' . $locale_alb->id;
                }
            }else{
                $trans[$locale.'.slug'] = 'nullable|string|unique:products_translations,slug';
            }
        }

        $trans['visible'] = 'boolean';
        $trans['special'] = 'boolean';
        $trans['price'] = 'nullable|numeric';
        $trans['category_id'] = 'required';
        $trans['ingredients'] = 'nullable|array';
        $trans['allergens'] = 'nullable|array';

        return $trans;
    }
}
