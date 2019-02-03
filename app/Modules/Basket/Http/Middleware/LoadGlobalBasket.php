<?php
/**
 * Copyright (c) 2017. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Http\Middleware;

use App\Modules\Basket\Models\Basket;
use Closure;
use Illuminate\Support\Facades\View;

/**
 * Зарежда стоките в количката на всеки адрес от магазина!
 *
 * @package App\Modules\Shop\Http\Middleware
 */
class LoadGlobalBasket {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $basket = Basket::my()->open()->first();
        View::share('basket', $basket);

        return $next($request);
    }
}
