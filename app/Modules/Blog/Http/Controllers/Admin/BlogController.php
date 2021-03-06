<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Blog\Http\Controllers\Admin;

use App\Modules\Blog\Forms\BlogFilterForm;
use App\Modules\Blog\Forms\BlogForm;
use App\Modules\Blog\Forms\NewsForm;
use App\Modules\Blog\Http\Requests\StoreBlogRequest;
use App\Modules\Blog\Models\Blog;
use Form;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use ProVision\Administration\Facades\Administration;
use ProVision\Administration\Http\Controllers\BaseAdministrationController;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends BaseAdministrationController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $blogs = Blog::reversed();
            $datatables = Datatables::of($blogs)
                ->addColumn('action', function ($blog) {
                    $actions = '';
                    if (!empty($blog->deleted_at)) {
                        //restore button
                    } else {
                        $actions .= Form::adminDeleteButton(trans('administration::index.delete'), Administration::route('blog.destroy', $blog->id));
                    }
                    $actions .= Form::mediaManager($blog);
                    $actions .= ' ' . Form::mediaManager($blog,
                            [
                                'filters' => [
                                    'mediaable_sub_type' => 'header'
                                ],
                                'button' => [
                                    'title' => 'Header',
                                    'class' => 'media-manager btn btn-sm btn-default',
                                    'icon' => 'header'
                                ]
                            ]
                        );
                    $actions .= Form::adminOrderButton($blog);
                    return Form::adminEditButton(trans('administration::index.edit'), Administration::route('blog.edit', $blog->id)) . $actions;
                })
                ->addColumn('visible', function ($blog) {
                    return Form::adminSwitchButton('visible', $blog);
                })
                ->filter(function ($query) use ($request) {

                    if ($request->filled('title')) {
                        $query->whereHas('translations', function ($q) use ($request) {
                            $q->where('title', 'LIKE', '%'. $request->get('title') . '%');
                        });
                    }

                });
            return $datatables->make(true);
        }

        $filterForm = $this->form(BlogFilterForm::class, [
            'method' => 'POST',
            'url' => Administration::route('blog.index')
        ]);

        Administration::setTitle(trans('blog::admin.module_name'));
        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('blog::admin.module_name'), Administration::route('blog.index'));
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
                'title' => trans('blog::admin.visible'),
            ])->addColumn([
                'data' => 'created_at',
                'name' => 'created_at',
                'title' => trans('blog::admin.date'),
            ]);
        return view('administration::empty-listing', compact('table', 'filterForm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create(BlogForm::class, [
                'method' => 'POST',
                'url' => Administration::route('blog.store'),
                'role' => 'form',
                'id' => 'formID'
            ]
        );
        Administration::setTitle(trans('blog::admin.create'));

        \Breadcrumbs::register('admin_final', function ($breadcrumbs) {
            $breadcrumbs->parent('admin_home');
            $breadcrumbs->push(trans('blog::admin.module_name'), Administration::route('blog.index'));
            $breadcrumbs->push(trans('blog::admin.create'), Administration::route('blog.create'));
        });

        return view('administration::empty-form', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $blog = new Blog();
        $blog->fill($data);
        $blog->save();

        return \Redirect::route(Administration::routeName('blog.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     * @throws \DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        $blog = Blog::where('id', $id)->first();
        if (!empty($blog)) {
            $form = $formBuilder->create(BlogForm::class, [
                    'method' => 'PUT',
                    'url' => Administration::route('blog.update', $blog->id),
                    'role' => 'form',
                    'id' => 'formID',
                    'model' => $blog
                ]
            );

            Administration::setTitle(trans('blog::admin.edit') . ' - ' . $blog->title);

            \Breadcrumbs::register('admin_final', function ($breadcrumbs) use ($blog) {
                $breadcrumbs->parent('admin_home');
                $breadcrumbs->push(trans('blog::admin.module_name'), Administration::route('blog.index'));
                $breadcrumbs->push($blog->title, Administration::route('blog.edit', $blog->id));
            });
            return view('administration::empty-form', compact('form'));
        } else {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBlogRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request, $id)
    {
        $blog = Blog::where('id', $id)->first();
        $data = $request->validated();
        $blog->fill($data);
        $blog->save();

        return \Redirect::route(Administration::routeName('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return response()->json(['ok'], 200);
    }
}
