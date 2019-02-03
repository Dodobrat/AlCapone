<?php
/**
 * Copyright (c) 2017. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Models;

use App\Modules\Products\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use ProVision\Administration\Facades\Settings;
use ProVision\Administration\Traits\RevisionableTrait;

class Basket extends Model {

    use RevisionableTrait;

    protected $table = 'baskets';

    protected $with = ['products'];

    protected $casts = [
        'data' => 'array',
        'saved_state' => 'array',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'status',
        'saved_state'
    ];

    /**
     * Дали има добавени продукти?
     */
    public static function hasProducts() {
        if (!View::shared('basket')) {
            return false;
        }

        return !View::shared('basket')->products->isEmpty();
    }

    /**
     * Връща инстанция на количката - ако има!
     *
     * @return mixed
     */
    public static function get() {
        return View::shared('basket');
    }

    /**
     * Сетва идентификатора на потребителя
     *
     * @return Basket
     */
    public function setUserIdentity() {

        if (\Administration::routeInAdministration()) {
            return $this;
        }

        if (Auth::check()) {
            $this->user_id = Auth::user()->id;
            $this->session_id = NULL;
        } else {
            $this->session_id = session()->getId();
//            $this->user_id = NULL;
        }
        return $this;
    }

    /**
     * Продукти в количката само на потребителя
     *
     * @param $query
     */
    public function scopeMy($query) {
        if (Auth::check()) {
            $query->where('user_id', Auth::user()->id)->whereNull('session_id');
        } else {
//            $query->where('session_id', session()->getId())->whereNull('user_id');
            $query->where('session_id', session()->getId());
        }
    }

    /**
     * Отворена количка с незавършена поръчка
     *
     * @param $query
     */
    public function scopeOpen($query) {
        $query->whereNull('ordered_at');

    }

    /**
     * Завършена поръчка
     *
     * @param $query
     */
    public function scopeFinished($query) {
        $query->whereNotNull('ordered_at');

    }

    /**
     * Product relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products() {
        return $this->hasMany(BasketProduct::class, 'basket_id', 'id');
    }


    public function getTotalPrice() {

        $total = 0;

        $products = $this->products;


        if ($products->isEmpty()) {
            return $total;
        }


        /** @var Product $product */
        foreach ($products as $product) {
            $total += $product->quantity * $product->getPrice();
        }

        return floatval($total);
    }


    /**
     * Връща общият брой продукти в количката
     *
     * @return integer
     */
    public function getTotalQuantity() {
        $total = 0;
        if ($this->products->isEmpty()) {
            return $total;
        }

        foreach ($this->products as $product) {
            $total += $product->quantity;
        }

        return intval($total);
    }

    /**
     * Завършване на поръчката
     */
    public function finish() {

        if (!empty($this->ordered_at) || !empty($this->order_id)) {
            throw new \Exception('Поръчката вече е завършена!');
        }


        if ($this->products->isEmpty()) {
            throw new \Exception('Не са добавени продукти!');
        }

        $this->shipping_price = $this->getShippingPrice();
        $this->ordered_at = Carbon::now();
        $this->status = 'new';
        $this->order_id = Basket::max('order_id') + 1;
        $this->saved_state = $this->products;

        $this->save();

        return true;
    }

    public function getSavedStateFullPrice() {
        $total = 0;

        foreach ($this->saved_state as $product) {
            $price = $product["product_option"]["price"];
            $total += $product['quantity'] * $price;
        }

        return $total;
    }

    /**
     * Изчислява цената за доставка
     */
    public function getShippingPrice() {

        if ($this->products->isEmpty()) {
            return 0;
        }

        /**
         * Ако поръчката е завършена връщаме цената за доставка която е записана в базата данни!
         */
        if (!empty($this->order_id)) {
            return $this->shipping_price;
        }

        $fixedPrice = floatval(Settings::get('basket_fixed_shipping_price'));
        $freeOver = floatval(Settings::get('basket_free_shipping_over'));

        if ($freeOver > 0 && $this->getTotal() > $freeOver) {
            return 0;
        } else {
            return $fixedPrice;
        }
    }

    /**
     * Дали е завършена поръчката
     */
    public function isFinished(): bool {
        return !empty($this->order_id);
    }


}
