@extends('layouts.app')

@section('content')
    <div class="page page--blog-index">
        <section class="page__header section section--primary">
            @include('index::front.boxes.page_header', ['title' => trans('blog::front.page_heading'), 'image' => (!empty(Settings::getFile('blog_header_image'))) ? Settings::getFile('blog_header_image') : asset('assets/images/no_img/K_no_img.png')])
        </section>

        <section class="page__post-catalog section section--primary">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        @include('blog::boxes.post_categories_menu', ['categories' => $news_categories, 'current_category' => $category])
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="post-excerpts">
                            @foreach ($news as $single_post)
                                @include('blog::boxes.post_excerpt', ['post' => $single_post])
                            @endforeach
                        </div>
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection