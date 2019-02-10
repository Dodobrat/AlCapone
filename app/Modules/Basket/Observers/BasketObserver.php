<?php
/**
 * Copyright (c) 2017. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Observers;

use App\Modules\Basket\Models\Basket;

class BasketObserver {

    /**
     * Ъпдейт на запис
     *
     * @param Basket $basket
     */
    public function updating(Basket $basket) {
        $this->fix($basket);
    }

    /**
     *
     * Проверка на данните за упдейт и създаване на нов запис
     *
     * @param Basket $basket
     *
     */
    protected function fix(Basket $basket) {
        $basket->setUserIdentity();
    }

    /**
     * Създаване на нов запис
     *
     * @param Basket $basket
     */
    public function creating(Basket $basket) {
        $this->fix($basket);
    }
}