<?php

namespace App\Modules\Basket\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class BasketController extends Controller
{
    public function index() {
        return view('basket::front.index');
    }
}
