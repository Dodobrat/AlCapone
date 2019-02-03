<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use SEO;

class CategoriesController extends Controller {
    public function index() {

        return view('categories::front.index');
    }


    public function getProducts(Request $request) {
        return response()->json(['haha' => 'stiga we bachka']);
    }

}
