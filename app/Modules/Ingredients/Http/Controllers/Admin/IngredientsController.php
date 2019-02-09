<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Ingredients\Http\Controllers\Admin;

use App\Modules\Ingredients\Forms\IngredientForm;
use App\Modules\Ingredients\Http\Requests\StoreIngredientRequest;
use App\Modules\Ingredients\Models\Ingredient;
use App\Modules\Products\Forms\ProductForm;
use App\Modules\Products\Http\Requests\StoreProductRequest;
use App\Modules\Products\Models\Product;
use Form;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use Yajra\DataTables\Facades\DataTables;

class IngredientsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $ingredients = Ingredient::query();
            $datatables = Datatables::of($ingredients)
                ->addColumn('action', function ($ingredient) {
                    $actions = '';
                    if (!empty($product->deleted_at)) {
//                        $actions .= Form::adminRestoreButton(trans('administration::index.restore'), Administration::route('products.destroy', $product->id));
                    } else {
                        $actions .= Form::adminDeleteButton(trans('administration::index.delete'), Administration::route('ingredients.destroy', $ingredient->id));
                    }
                    return Form::adminEditButton(trans('administration::index.edit'), Administration::route('ingredients.edit', $ingredient->id)) . $actions;
                })
                ->addColumn('visible', function ($ingredient) {
                    return Form::adminSwitchButton('visible', $ingredient);
                });
            return $datatables->make(true);
        }


        Administration::setTitle(trans('ingredients::admin.module_name'));
        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('ingredients::admin.module_name'), Administration::route('ingredients.index'));
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
                'data' => 'visible',
                'name' => 'visible',
                'title' => trans('ingredients::admin.visible'),
            ])->addColumn([
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('ingredients::admin.date'),
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
        $form = $formBuilder->create(IngredientForm::class, [
                'method' => 'POST',
                'url' => Administration::route('ingredients.store'),
                'role' => 'form',
                'id' => 'formID'
            ]
        );
        Administration::setTitle(trans('ingredients::admin.create'));

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('ingredients::admin.module_name'), Administration::route('ingredients.index'));
            $breadcrumbs->push(trans('ingredients::admin.create'), Administration::route('ingredients.create'));
        });

        return view('administration::empty-form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreIngredientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIngredientRequest $request) {
        $data = $request->validated();
        $ingredient = new Ingredient();
        $ingredient->fill($data);
        $ingredient->save();

        return \Redirect::route(Administration::routeName('ingredients.index'));
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
        $ingredient = Ingredient::where('id', $id)->first();
        if (empty($ingredient)) {
            return back();
        }
        $form = $formBuilder->create(IngredientForm::class, [
                'method' => 'PUT',
                'url' => Administration::route('ingredients.update', $ingredient->id),
                'role' => 'form',
                'id' => 'formID',
                'model' => $ingredient
            ]
        );

        Administration::setTitle(trans('ingredients::admin.edit') . ' - ' . $ingredient->title);

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($ingredient) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('ingredients::admin.module_name'), Administration::route('ingredients.index'));
            $breadcrumbs->push($ingredient->title, Administration::route('ingredients.edit', $ingredient->id));
        });
        return view('administration::empty-form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreIngredientRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreIngredientRequest $request, $id) {
        $ingredient = Ingredient::where('id', $id)->first();
        $data = $request->validated();
        $ingredient->fill($data);
        $ingredient->save();

        return \Redirect::route(Administration::routeName('ingredients.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $model = Ingredient::where('id', $id)->first();

        $model->delete();
        return response()->json(['ok'], 200);
    }
}
