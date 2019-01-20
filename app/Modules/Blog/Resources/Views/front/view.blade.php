@extends('layouts.app')

@section('content')
    <div class="page page--blog-view">
        <section class="page__header section section--primary"></section>

        <section class="page__nav section section--primary">
            <div class="container">
                <div class="breadcrumbs-wrapper">
                    {!! Breadcrumbs::render('index') !!}
                </div>
                <nav class="posts-module-nav">
                    <a class="posts-module-nav__button-back button button--type-1" href="{{ route('blog.index') }}"><i class="fas fa-arrow-left"></i> @lang('blog::front.nav_button_back')
                    </a>
                </nav>
            </div>
        </section>

        <section class="page__post section section--primary">
            <div class="container">
                <div class="post post--full">
                    @if (!empty($blog->title))
                        <h1 class="post__heading heading">{{ $blog->title }}</h1>
                    @endif
                    <div class="post__image-wrapper">
                        @if ($blog->header_media->isNotEmpty())
                            <img class="w-100" src="{{ $blog->header_media->first()->getPublicCachePath('O') }}">
                        @else
                            <img class="w-100" src="{{asset('assets/images/no_img/O_no_img.png')}}">
                        @endif
                        <div class="fb-like" data-href="{{ route('blog.view', ['slug' => $blog->slug]) }}" data-layout="button" data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                    </div>
                    <div class="post__details">
                        @if (!empty($blog->category))
                            <a class="post__category link link--type-1" href="{{ route('blog.index', ['slug' => $blog->category->slug]) }}"># {{ $blog->category->title }}</a>
                        @endif
                        @if (!empty($blog->date))
                            <span class="post__date">{{ Carbon\Carbon::parse($blog->date)->format('j/n/Y') }}</span>
                        @endif
                    </div>

                    @if (!empty($blog->sub_title))
                        <h4 class="post__sub_title">{!! $blog->sub_title !!}</h4>
                    @endif
                    @if (!empty($blog->description))
                        <div class="post__description custom-content">{!! $blog->description !!}</div>
                    @endif

                </div>
            </div>
        </section>

        @if (!empty($similar_article))
            <section class="page__related-posts section section--primary">
                <div class="container">
                    <div class="related-posts">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-3">
                                <h1 class="related-posts__heading heading">@lang('blog::front.related_posts_heading')</h1>
                            </div>
                            <div class="col-12 col-lg-9">
                                @include('blog::boxes.post_excerpt', ['post' => $similar_article])
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>
@endsection