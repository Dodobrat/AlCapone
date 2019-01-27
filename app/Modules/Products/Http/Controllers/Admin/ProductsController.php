<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Products\Http\Controllers\Admin;

use App\Modules\Products\Forms\ProductForm;
use App\Modules\Products\Http\Requests\StoreProductRequest;
use App\Modules\Products\Models\Product;
use Form;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $products = Product::reversed()->with(['category']);
            $datatables = Datatables::of($products)
                ->editColumn('price', function ($product) {
                    return currency($product->getPrice());
                })
                ->addColumn('category', function ($product) {
                    return $product->category->title;
                })
                ->addColumn('action', function ($product) {
                    $actions = '';
                    if (!empty($product->deleted_at)) {
//                        $actions .= Form::adminRestoreButton(trans('administration::index.restore'), Administration::route('products.destroy', $product->id));
                    } else {
                        $actions .= Form::adminDeleteButton(trans('administration::index.delete'), Administration::route('products.destroy', $product->id));
                    }
                    $actions .= Form::mediaManager($product);
                    $actions .= Form::adminOrderButton($product);
                    $actions .= ' <a class="btn btn-sm btn-warning" target="_blank" href="' . Administration::route('products.options.index', ['shop_product' => $product->id]) . '" title="' . trans('projects::admin.options') . '"><i class="fa fa-window-restore" aria-hidden="true"></i></a>';
                    return Form::adminEditButton(trans('administration::index.edit'), Administration::route('products.edit', $product->id)) . $actions;
                })
                ->addColumn('visible', function ($product) {
                    return Form::adminSwitchButton('visible', $product);
                });
            return $datatables->make(true);
        }


        Administration::setTitle(trans('products::admin.module_name'));
        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('products::admin.module_name'), Administration::route('products.index'));
        });
        $table = Datatables::getHtmlBuilder()
            ->addColumn([
                'data' => 'id',
                'name' => 'id',
                'title' => trans('administration::administrators.id'),
            ])->addColumn([
                'data' => 'title',
                'name' => 'title',
                'title' => trans('administration::administrators.name'),
            ])->addColumn([
                'data' => 'price',
                'name' => 'price',
                'title' => trans('products::admin.price'),
            ])->addColumn([
                'data' => 'category',
                'name' => 'category',
                'title' => trans('products::admin.category_id'),
            ])->addColumn([
                'data' => 'visible',
                'name' => 'visible',
                'title' => trans('products::admin.visible'),
            ])->addColumn([
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('products::admin.date'),
            ]);
        return view('administration::empty-listing', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder) {
        $form = $formBuilder->create(ProductForm::class, [
                'method' => 'POST',
                'url' => Administration::route('products.store'),
                'role' => 'form',
                'id' => 'formID'
            ]
        );
        Administration::setTitle(trans('products::admin.create'));

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('products::admin.module_name'), Administration::route('products.index'));
            $breadcrumbs->push(trans('products::admin.create'), Administration::route('products.create'));
        });

        return view('administration::empty-form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request) {
        $data = $request->validated();
        $product = new Product();
        $product->fill($data);
        $product->save();

        return \Redirect::route(Administration::routeName('products.index'));
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
        $product = Product::where('id', $id)->first();
        if (empty($product)) {
            return back();
        }
        $form = $formBuilder->create(ProductForm::class, [
                'method' => 'PUT',
                'url' => Administration::route('products.update', $product->id),
                'role' => 'form',
                'id' => 'formID',
                'model' => $product
            ]
        );

        Administration::setTitle(trans('products::admin.edit') . ' - ' . $product->title);

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($product) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('products::admin.module_name'), Administration::route('products.index'));
            $breadcrumbs->push($product->title, Administration::route('products.edit', $product->id));
        });
        return view('administration::empty-form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreProductRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id) {
        $product = Product::where('id', $id)->first();
        $data = $request->validated();
        $product->fill($data);
        $product->save();

        return \Redirect::route(Administration::routeName('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $model = Product::where('id', $id)->first();

        $model->delete();
        return response()->json(['ok'], 200);
    }
}
