<?php
/**
 * Copyright (c) 2017. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Models;

use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductOption;
use Illuminate\Database\Eloquent\Model;

class BasketProduct extends Model {
    protected $table = 'basket_products';

    protected $with = [
        'product',
        'product.media',
        'product_option',
    ];

    protected $fillable = [
        'product_id',
        'product_option_id',
        'quantity'
    ];

    /**
     * Product relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Всички групата опции
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product_option() {
        return $this->hasOne(ProductOption::class, 'id', 'option_id');
    }

    /**
     * Цена на продукта
     *
     * @return float
     */
    public function getPrice() {
        return $this->product->getPrice($this->option_id);
    }

    /**
     * Налично количество от продукта + опция (ако има)
     *
     * @return integer
     */
    public function getQuantity() {
        return $this->quantity;
    }

}
