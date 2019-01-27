<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Options\Http\Controllers\Admin;

use App\Modules\Options\Forms\OptionsForm;
use App\Modules\Options\Http\Requests\StoreOptionRequest;
use App\Modules\Options\Models\Option;
use Form;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use Yajra\DataTables\Facades\DataTables;

class OptionsController extends BaseAdministrationController {
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request) {
        if ($request->ajax()) {
            $options = Option::reversed();
            $datatables = Datatables::of($options)
                ->addColumn('action', function ($option) {
                    $actions = '';
                    if (!empty($option->deleted_at)) {
//                        $actions .= Form::adminRestoreButton(trans('administration::index.restore'), Administration::route('options.destroy', $option->id));
                    } else {
                        $actions .= Form::adminDeleteButton(trans('administration::index.delete'), Administration::route('options.destroy', $option->id));
                    }
                    $actions .= Form::adminOrderButton($option);
                    return Form::adminEditButton(trans('administration::index.edit'), Administration::route('options.edit', $option->id)) . $actions;
                })
                ->addColumn('visible', function ($option) {
                    return Form::adminSwitchButton('visible', $option);
                });
            return $datatables->make(true);
        }


        Administration::setTitle(trans('options::admin.module_name'));
        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('options::admin.module_name'), Administration::route('options.index'));
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
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('options::admin.date'),
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
        $form = $formBuilder->create(OptionsForm::class, [
                'method' => 'POST',
                'url' => Administration::route('options.store'),
                'role' => 'form',
                'id' => 'formID'
            ]
        );
        Administration::setTitle(trans('options::admin.create'));

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('options::admin.module_name'), Administration::route('options.index'));
            $breadcrumbs->push(trans('options::admin.create'), Administration::route('options.create'));
        });

        return view('administration::empty-form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOptionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOptionRequest $request) {
        $data = $request->validated();
        $option = new Option();
        $option->fill($data);
        $option->save();

        return \Redirect::route(Administration::routeName('options.index'));
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
        $option = Option::where('id', $id)->first();
        if (empty($option)) {
            return back();
        }
        $form = $formBuilder->create(OptionsForm::class, [
                'method' => 'PUT',
                'url' => Administration::route('options.update', $option->id),
                'role' => 'form',
                'id' => 'formID',
                'model' => $option
            ]
        );

        Administration::setTitle(trans('options::admin.edit') . ' - ' . $option->title);

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($option) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('options::admin.module_name'), Administration::route('options.index'));
            $breadcrumbs->push($option->title, Administration::route('options.edit', $option->id));
        });
        return view('administration::empty-form', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreOptionRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOptionRequest $request, $id) {
        $option = Option::where('id', $id)->first();
        $data = $request->validated();
        $option->fill($data);
        $option->save();

        return \Redirect::route(Administration::routeName('options.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $model = Option::where('id', $id)->first();

        $model->delete();
        return response()->json(['ok'], 200);
    }
}
