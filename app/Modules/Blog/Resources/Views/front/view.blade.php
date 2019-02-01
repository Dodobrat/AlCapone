@extends('layouts.app')
@section('content')



    <div class="full-cover">
        <div class="full-cover-img"
             @if(!empty($blog->media->first()))
             style="background-image: url('{{ $blog->media->first()->getPublicPath() }}')"
             @else
             style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                @endif>
            <div class="container">

                <div class="row align-items-center justify-content-center">
                    <div class="col-12" data-aos="fade-up">
                        <h2 class="page-title-blog">{{ $blog->title }}</h2>

                        <div class="post-info">
                            <div class="date-info">{{ $blog->created_at->format('M-d-Y') }}</div>
                            <div class="author-info">
                                <span class="separator">|</span> By <a>{{ $blog->author }}</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="blog-post-section">
                <div class="container b-p">
                    <div class="post-header">
                        @if(!empty($blog->header_media->first()))
                            <img src="{{$blog->header_media->first()->getPublicPath()}}">
                        @else
                            <img src="{{asset('img/news_2.jpg')}}">
                        @endif
                    </div>
                    {!! $blog->description !!}
                </div>
            </div>


        </div>
    </div>

@endsection