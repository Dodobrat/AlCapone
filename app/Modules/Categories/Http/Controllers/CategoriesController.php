<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\Product;
use Illuminate\Support\Facades\Request;
use SEO;

class CategoriesController extends Controller {
    public function index() {
        $categories = Category::has('products')->active()->get();
        $products = Product::active()->paginate(20);

        return view('categories::front.index', compact('products', 'categories'));
    }


    public function getProducts(Request $request) {
        $errors = [];

        if (empty($request->get('category_id'))) {
            $errors[] = 'problem';
        }

        $products = Product::active()->where('category_id', $request->get('category_id'))->paginate(20);
        return response()->json(['haha' => 'stiga we bachka']);
    }

}
