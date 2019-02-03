<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Basket\Http\Controllers\Admin;

use App\Modules\Basket\Forms\BasketForm;
use App\Modules\Basket\Http\Requests\StoreBasketRequest;
use App\Modules\Basket\Models\Basket;
use Form;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use Yajra\DataTables\Facades\DataTables;

class BasketsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $baskets = Basket::orderBy('order_id', 'desc');
            $datatables = Datatables::of($baskets)
                ->editColumn('price', function ($basket) {
                    return currency($basket->getTotalPrice());
                })
                ->addColumn('first_name', function ($basket) {
                    return (!empty($basket->data['first_name'])) ? $basket->data['first_name'] : 'None';
                })
                ->addColumn('last_name', function ($basket) {
                    return (!empty($basket->data['last_name'])) ? $basket->data['last_name'] : 'None';
                })
                ->addColumn('action', function ($basket) {
                    $actions = '';
                    if (!empty($basket->deleted_at)) {
//                        $actions .= Form::adminRestoreButton(trans('administration::index.restore'), Administration::route('products.destroy', $product->id));
                    } else {
                        $actions .= Form::adminDeleteButton(trans('administration::index.delete'), Administration::route('basket.destroy', $basket->id));
                    }
                    return Form::adminEditButton(trans('administration::index.edit'), Administration::route('basket.edit', $basket->id)) . $actions;
                });

            return $datatables->make(true);
        }


        Administration::setTitle(trans('basket::admin.module_name'));
        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('basket::admin.module_name'), Administration::route('basket.index'));
        });
        $table = Datatables::getHtmlBuilder()
            ->addColumn([
                'data' => 'id',
                'name' => 'id',
                'title' => trans('administration::administrators.id'),
            ])->addColumn([
                'data' => 'order_id',
                'name' => 'order_id',
                'title' => trans('basket::admin.order_id'),
            ])->addColumn([
                'data' => 'first_name',
                'name' => 'first_name',
                'title' => trans('basket::admin.first_name'),
            ])->addColumn([
                'data' => 'last_name',
                'name' => 'last_name',
                'title' => trans('basket::admin.last_name'),
            ])->addColumn([
                'data' => 'price',
                'name' => 'price',
                'title' => trans('basket::admin.price'),
            ])->addColumn([
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('basket::admin.date'),
            ]);
        return view('administration::empty-listing', compact('table'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     * @throws \DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException
     */
    public function edit($id, FormBuilder $formBuilder) {
        $basket = Basket::where('id', $id)->first();
        if (empty($basket)) {
            return back();
        }
        $form = $formBuilder->create(BasketForm::class, [
                'method' => 'PUT',
                'url' => Administration::route('basket.update', $basket->id),
                'role' => 'form',
                'id' => 'formID',
                'model' => $basket
            ]
        );

        Administration::setTitle(trans('basket::admin.edit') . ' - ' . $basket->title);

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($basket) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('basket::admin.module_name'), Administration::route('basket.index'));
            $breadcrumbs->push($basket->order_id, Administration::route('basket.edit', $basket->id));
        });
        return view('administration::empty-form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBasketRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBasketRequest $request, $id) {
        $basket = Basket::where('id', $id)->first();
        $data = $request->validated();
        $basket->fill($data);
        $basket->save();

        return \Redirect::route(Administration::routeName('basket.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $basket = Basket::where('id', $id)->first();

        $basket->delete();
        return response()->json(['ok'], 200);
    }
}
