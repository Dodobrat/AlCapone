<?php
/**
 * Copyright (c) 2017. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Products\Http\Controllers\Admin;


use App\Modules\Options\Models\Option;
use App\Modules\Products\Http\Requests\StoreProductOptionRequest;
use App\Modules\Products\Models\Product;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;

class ProductsOptionsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param $product_id
     * @return \Illuminate\Http\Response
     */
    public function index($product_id) {

        $product = Product::where('id', $product_id)->with([
            'options',
        ])->first();

        if (!empty($product->id)) {


            Administration::setTitle($product->title . ' - ' . trans('products::admin.options'));

            \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($product) {
                $breadcrumbs->parent('admin_home');
                $breadcrumbs->push(trans('products::admin.module_name'), Administration::route('products.index'));
                $breadcrumbs->push($product->title . ' - ' . trans('products::admin.options'), Administration::route('products.options.index', ['shop_product' => $product->id]));
            });

            $options = Option::all();

            return view('products::admin.products_options', compact('product', 'options'));

        } else {
            return \Redirect::route(Administration::routeName('products.index'));
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param $id
     * @param StoreProductOptionRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store($id, StoreProductOptionRequest $request) {
        $data = $request->only(array_keys($request->rules()));

        $product = Product::where('id', $id)->first();

        if (empty($product) || empty($data['options'])) {
            return back();
        }

        foreach ($data['options'] as $spec_data) {
            if (empty($spec_data['price'])) {
                continue;
            }
            $product->options()->attach($spec_data['option_id'], ['price' => $spec_data['price']]);
        }

        return back();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductOptionRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductOptionRequest $request, $id) {
        $data = $request->only(array_keys($request->rules()));
        $product = Product::where('id', $id)->first();

        if (empty($product) || empty($data['options'])) {
            return back();
        }

        /**
         * Ъпдейт на данните
         */
        foreach ($data['options'] as $spec_data) {
            $option = $product->options()->where('option_id', $spec_data['option_id'])->first();

            if (!empty($option)) {
                $option->pivot->price = $spec_data['price'];
                $option->pivot->save();
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $product_id
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $id) {
        $product = Product::where('id', $product_id)->first();
        $product->options()->detach($id);
        return response()->json(['ok'], 200);
    }
}
