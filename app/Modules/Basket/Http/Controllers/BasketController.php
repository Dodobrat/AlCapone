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

        if ($request->has('product_option_id')) {
            $basketProductQuery->where('product_option_id', $request->product_option_id);
        } else {
            $basketProductQuery->whereNull('product_option_id');
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
            'global_basket' => view('boxes.global-basket', compact('basket'))->render(),
            'total_quantity' => $basket->getTotalQuantity()
        ]);

    }
//
//    public function finished(FinishOrderRequest $request) {
//
//        $basket = Basket::my()->open();
//        $basket->finish();
//
//
//        if ($user) {
//            /**
//             * Изпраща до клиента
//             */
//            Mail::to($user)->send(new NewOrderMail($user, $basket));
//
//            /*
//             * Изпраща до админа
//             */
//
//            if (!empty(Settings::get('shop_admin_email'))) {
//                $admin_email = Settings::get('shop_admin_email');
//                Mail::to($admin_email)->send(new NewOrderMail($user, $basket));
//            }
//
//        }
//
//        return view('shop::front.basket.finished', [
//            'basket' => new Basket(),
//            'order' => $basket
//        ]);
//    }


}
