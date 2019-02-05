{{--$news--}}

@extends('layouts.app')
@section('content')


    <div class="page-cover">
        <div class="page-cover-img"
             @if(!empty(Settings::getFile('blog_header_image')))
             style="background-image: url('{{ Settings::getFile('blog_header_image') }}')"
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
    {{--BLOG VIEW TITLE SECTION--}}

        <div class="section blog-view-section">
            <div class="container">

                <div class="card-columns">
                    @foreach($news as $blog)
                    <div class="card" data-aos="zoom-in">
                        <a href="{{ route('blog.view', $blog->slug) }}" class="blog-item-link">
                            @if(!empty($blog->header_media->first()))
                                <img class="card-img-top" src="{{$blog->header_media->first()->getPublicPath()}}">
                            @else
                                <img class="card-img-top" src="{{asset('img/news_2.jpg')}}">
                            @endif
                        </a>
                        <div class="card-body">
                            <a class="card-title" href="{{ route('blog.view', $blog->slug) }}">{{ $blog->title }}</a>
                            <p class="card-date">
                                <span class="fa fa-calendar"></span>
                                <span class="date-span">{{ $blog->created_at->format('d-M-Y') }}</span>
                            </p>
                            <p class="card-text">
                                @if(!empty($blog->description))
                                    {!! mb_substr(strip_tags($blog->description),0,100)." ..." !!}
                                @endif
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    {{--BLOG VIEW SECTION--}}
<div class="pagination-container">
    {{$news->links()}}
</div>


    @endsection