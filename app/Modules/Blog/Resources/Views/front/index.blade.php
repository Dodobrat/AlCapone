{{--$news--}}

@extends('layouts.app')
@section('content')


    <div class="page-cover">
        <div class="page-cover-img"
             @if(!empty(Settings::getFile('_cover')))
             style="background-image: url('{{ Settings::getFile('_cover') }}')"
             @else
             style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                @endif>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-12" data-aos="fade-up">
                        <h2 class="page-title">{{ trans('blog::front.blog') }}</h2>
                        <div class="page-lead">
                            @if(!empty(Administration::getStaticBlock('blog')))
                                {!! Administration::getStaticBlock('blog') !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="section blog-view-section">
            <div class="container">

                <div class="row justify-content-center mb-5">

                    @foreach($news as $blog)

                        <div class="col-lg-4 col-md-6 col-sm-10 col-12">
                            <div class="blog-item" data-aos="fade-up">
                                <a href="{{ route('blog.view', $blog->slug) }}" class="blog-item-link">
                                    {{--@if(!empty($article->thumbnail_media->first()))--}}
                                        {{--<img class="blog-item-link-img" src="{{$article->thumbnail_media->first()->getPublicPath()}}">--}}
                                    {{--@else--}}
                                        {{--<img class="blog-item-link-img" src="{{asset('img/news_2.jpg')}}">--}}
                                    {{--@endif--}}
                                        <img class="blog-item-link-img" src="{{asset('img/news_2.jpg')}}">
                                </a>
                                <div class="blog-item-body">
                                    <h3 class="blog-item-body-title"><a href="{{ route('blog.view', $blog->slug) }}" class="blog-item-body-title-link">{{ $blog->title }}</a></h3>
                                    <p class="blog-item-body-date"><span class="fa fa-calendar"></span><span class="blog-item-body-date-span">{{ $blog->created_at->format('d-M-Y') }}</span></p>
                                    <p class="blog-item-body-description">
                                        @if(strlen($blog->description) >= 150)
                                            {!! substr($blog->description,0,150)." ..." !!}
                                        @else
                                            {!! $blog->description !!}
                                        @endif
                                    </p>
                                    <a href="{{ route('blog.view', $blog->slug) }}" class="blog-item-body-read-link"><button class="blog-item-body-read">{{ trans('blog::front.read-more') }}</button></a>
                                </div>
                            </div>
                        </div>

                    @endforeach



                </div>

            </div>
        </div> <!-- .section -->


    @endsection