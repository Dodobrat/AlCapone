<?php

namespace App\Modules\Basket\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Basket\Http\Requests\StoreBasketProduct;
use App\Modules\Basket\Models\Basket;
use App\Modules\Basket\Models\BasketProduct;

class BasketController extends Controller {
    public function index() {
        return view('basket::front.index');
    }


    public function add(StoreBasketProduct $request) {

        $basket = Basket::my()->open()->with(['products'])->first();


        if (!$basket) {
            $basket = new Basket();
            $basket->save();
        }

        /**
         * Добавяме продукта ако има вече го ъпдейт с новото количество
         */
        $basketProductQuery = BasketProduct::where('basket_id', $basket->id)
            ->where('product_id', $request->product_id);

        if ($request->has('option_id')) {
            $basketProductQuery->where('option_id', $request->option_id);
        } else {
            $basketProductQuery->whereNull('option_id');
        }

        $basketProduct = $basketProductQuery->first();


        if (!$basketProduct) {
            $basketProduct = new BasketProduct($request->validated());
        } else {
            $basketProduct->quantity += $request->quantity;
        }

        $basket->products()->save($basketProduct);
        $basket = $basket->fresh();

        return response()->json([
            'small_basket' => view('shop::boxes.small-basket', compact('basket'))->render(),
            'total_quantity' => $basket->getTotalQuantity()
        ]);

    }
}
