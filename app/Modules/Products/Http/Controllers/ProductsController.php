<?php

namespace App\Modules\Products\Http\Controllers;

use App\Modules\Products\Models\Product;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function getProduct(Request $request) {

        $errors = [];

        if (empty($request->get('product_id'))) {
            $errors[] = trans('products::front.error');
        }

        $product = Product::with(['options', 'ingredients', 'allergens', 'media'])->where('id', $request->product_id)->first();

        if (empty($product)) {
            $errors[] = trans('products::front.error');
        }

        return response()->json([
            'errors' => $errors,
            'product_modal' => view('categories::front.boxes.product-view', compact('product'))->render(),
        ]);
    }
}
