<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\Product;

use Illuminate\Http\Request;
use SEO;

class CategoriesController extends Controller {
    public function index($slug = null) {


        $categories = Category::has('products')->active()->get();

        $current_category = $categories->first();
        if (!empty($slug)) {
            $current_category = Category::whereTranslation('slug', $slug)->first();
        }


        $products = Product::active()->where('category_id', $current_category->id)->paginate(20);

        return view('categories::front.index', compact('products', 'categories', 'current_category'));
    }


    public function getProducts(Request $request) {
        $errors = [];

        if (empty($request->get('category_slug'))) {
            $errors[] = 'nqma slug';
        }

        $category = Category::whereTranslation('slug', $request->get('category_slug'))->first();

        if (empty($category)) {
            $errors[] = 'nqma categoriq';
        }

        if (empty($errors)) {
            $products = Product::active()->where('category_id', $category->id)->paginate(20);
        }

        $new_products = view('categories::front.boxes.products', compact('products', 'category'))->render();
        return response()->json(['errors' => $errors, 'new_blade' => $new_products]);
    }

}
