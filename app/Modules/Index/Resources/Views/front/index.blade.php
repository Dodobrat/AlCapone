@extends('layouts.app')
@section('content')

    <div class="page-cover">
        <div class="page-cover-img"
             @if(!empty(Settings::getFile('index_header_image')))
             style="background-image: url('{{ Settings::getFile('index_header_image') }}')"
             @else
             style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                @endif id="home-img">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-12" data-aos="fade-up">
                        <h1 class="page-title">{{ trans('index::front.index') }}</h1>
                        <div class="page-lead">
                            @if(!empty(Administration::getStaticBlock('index')))
                                {!! Administration::getStaticBlock('index') !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <div class="section services-section py-5">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6 col-lg-3 my-5" data-aos="fade-up">
                            <div class="media feature-icon d-block text-center">
                                <div class="icon">
                                    <span class="flaticon-soup"></span>
                                </div>
                                <div class="media-body">
                                    <h3>{{ trans('index::front.quality-cuisine') }}</h3>
                                    <div class="service-block">
                                        @if(!empty(Administration::getStaticBlock('quality-cuisine')))
                                            {!! Administration::getStaticBlock('quality-cuisine') !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="media feature-icon d-block text-center">
                                <div class="icon">
                                    <span class="flaticon-vegetables"></span>
                                </div>
                                <div class="media-body">
                                    <h3>{{ trans('index::front.fresh-food') }}</h3>
                                    <div class="service-block">
                                        @if(!empty(Administration::getStaticBlock('fresh-food')))
                                            {!! Administration::getStaticBlock('fresh-food') !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-5" data-aos="fade-up" data-aos-delay="300">
                            <div class="media feature-icon d-block text-center">
                                <div class="icon">
                                    <span class="flaticon-pancake"></span>
                                </div>
                                <div class="media-body">
                                    <h3>{{ trans('index::front.friendly-staff') }}</h3>
                                    <div class="service-block">
                                        @if(!empty(Administration::getStaticBlock('friendly-staff')))
                                            {!! Administration::getStaticBlock('friendly-staff') !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 my-5" data-aos="fade-up" data-aos-delay="500">
                            <div class="media feature-icon d-block text-center">
                                <div class="icon">
                                    <span class="flaticon-tray"></span>
                                </div>
                                <div class="media-body">
                                    <h3>{{ trans('index::front.easy-reservation') }}</h3>
                                    <div class="service-block">
                                        @if(!empty(Administration::getStaticBlock('easy-reservation')))
                                            {!! Administration::getStaticBlock('easy-reservation') !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--SERVICE SECTION--}}

            <div class="container">
                <div class="hr"></div>
            </div>


            <div class="section specials-section-heading">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center"  data-aos="fade-up">
                            <h2 class="mb-4">{{ trans('index::front.specials') }}</h2>
                            <div class="service-block">
                                @if(!empty(Administration::getStaticBlock('specials')))
                                    {!! Administration::getStaticBlock('specials') !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--SPECIALS SECTION HEADING--}}

            <div class="section specials-section pb-5 mb-5 pt-5 px-2 px-sm-4 px-md-5">
                <div class="row justify-content-center align-items-center mx-0">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_1.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_2.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_3.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_4.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_5.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_1.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_1.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 special-item px-0 my-3 my-sm-3 my-md-3">
                        <div class="special-item-img-container">
                            <img src="{{ asset('/img/img_2.jpg') }}" alt="" class="special-item-img">
                        </div>
                        <div class="special-item-overlay-container">
                            <div class="special-item-overlay">
                                <h3 class="special-item-title">Пица с гъби и ананас</h3>
                                <div class="special-item-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad architecto aut blanditiis, consequatur, eius est et facilis impedit inventore laudantium optio pariatur sed. Animi, eligendi, maiores. Architecto dolores, earum?</div>
                                <div class="row align-items-center special-item-info">
                                    <div class="col-8 pr-0">
                                        <h3 class="special-item-price">15.00 лв.</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#" class="special-item-link"><i class="fa fa-cart-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--SPECIALS SECTION--}}

            {{--<div class="menu-categories-section-heading my-5 py-5">--}}
                {{--<div class="container">--}}
                    {{--<div class="row justify-content-center">--}}
                        {{--<div class="col-md-7 text-center"  data-aos="fade-down">--}}
                            {{--<h2 class="mb-4">{{ trans('index::front.browse-menu-categories') }}</h2>--}}
                            {{--<div class="service-block">--}}
                                {{--@if(!empty(Administration::getStaticBlock('categories')))--}}
                                    {{--{!! Administration::getStaticBlock('categories') !!}--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="menu-categories-section mb-5">--}}
                {{--<div class="container menu-category-home-item-container">--}}
                    {{--<div class="menu-category-home-item">--}}
                        {{--<h3><img src="{{ asset('img/slider-1.jpg') }}" alt="">САЛАТИ</h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

    @if($articles->count() > 0)

        <div class="blog-home-title-section">

        </div>


        <div class="blog-home-section">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                        <div class="@if($articles->count() < 3) col-lg-12 @else col-lg-6 @endif col-md-12 col-sm-12 col-12">
                            <ul class="blog-home-list">
                                @foreach($articles as $blog)
                                    @if ($loop->last && $articles->count() >= 3)
                                        @php continue; @endphp
                                    @endif
                                    <li class="blog-home-item">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                                                <a href="{{ route('blog.view', $blog->slug) }}" class="blog-home-item-link">
                                                    @if(!empty($blog->header_media->first()))
                                                        <img class="blog-home-item-link-img" src="{{$blog->header_media->first()->getPublicPath()}}">
                                                    @else
                                                        <img class="blog-home-item-link-img" src="{{asset('img/news_2.jpg')}}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                                                <h3 class="blog-home-item-title"><a href="{{ route('blog.view', $blog->slug) }}" class="blog-item-title-link">{{ $blog->title }}</a></h3>
                                                <p class="blog-home-item-date"><span class="fa fa-calendar"></span><span class="blog-home-item-date-span">{{ $blog->created_at->format('d-M-Y') }}</span></p>
                                                <div class="blog-home-item-description">
                                                    @if(!empty($blog->description))
                                                        {!! substr(strip_tags($blog->description),0,50)." ..." !!}
                                                    @endif
                                                </div>
                                                <a href="{{ route('blog.view', $blog->slug) }}" class="blog-home-item-read-link"><button class="blog-home-item-read">{{ trans('blog::front.read-more') }}</button></a>
                                            </div>
                                        </div>


                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @if ($articles->count() >= 3)
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                                <div class="blog-home-main-item">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <a href="{{ route('blog.view', $blog->slug) }}" class="blog-home-main-item-link">
                                                @if(!empty($blog->header_media->first()))
                                                    <img class="blog-home-main-item-link-img" src="{{$blog->header_media->first()->getPublicPath()}}">
                                                @else
                                                    <img class="blog-home-main-item-link-img" src="{{asset('img/news_2.jpg')}}">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-12">
                                            <h3 class="blog-home-main-item-title"><a href="{{ route('blog.view', $blog->slug) }}" class="blog-main-item-title-link">{{ $blog->title }}</a></h3>
                                            <p class="blog-home-main-item-date"><span class="fa fa-calendar"></span><span class="blog-home-main-item-date-span">{{ $blog->created_at->format('d-M-Y') }}</span></p>
                                            <div class="blog-home-main-item-description">
                                                @if(!empty($blog->description))
                                                    {!! substr(strip_tags($blog->description),0,150)." ..." !!}
                                                @endif
                                            </div>
                                            <a href="{{ route('blog.view', $blog->slug) }}" class="blog-home-main-item-read-link">
                                                <button class="blog-home-main-item-read">{{ trans('blog::front.read-more') }}</button>
                                            </a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endif
                </div>
            </div>
        </div>
    @endif


    {{--<div class="section bg-light">--}}
        {{--<div class="container">--}}
            {{--<div class="row justify-content-center mb-5" data-aos="fade-up">--}}
                {{--<div class="col-md-8  text-center">--}}
                    {{--<h2 class="mb-3">Events &amp; News</h2>--}}
                    {{--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum fuga, alias distinctio voluptatum magni voluptatibus.</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="@if($articles->count() < 3) col-lg-12 @else col-lg-6 @endif">--}}

                    {{--@foreach($articles as $article)--}}
                        {{--@if ($loop->last && $articles->count() >= 3)--}}
                            {{--@php continue; @endphp--}}
                            {{--@endif--}}
                    {{--<div class="media d-block d-lg-flex mb-5"  data-aos="fade-up" data-aos-delay="100">--}}
                        {{--<figure class="mr-4 horizontal">--}}
                            {{--<img src="img/news_1.jpg" alt="Image placeholder" class="img-fluid">--}}
                        {{--</figure>--}}
                        {{--<div class="media-body">--}}
                            {{--<h3><a href="#">{{ $article->title }}</a></h3>--}}
                            {{--<p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>--}}
                            {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>--}}
                            {{--<p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div> <!-- .media -->--}}
                    {{--@endforeach--}}

                {{--</div> <!-- .col-md-6 -->--}}
                {{--@if ($articles->count() >= 3)--}}
                {{--<div class="col-lg-6">--}}
                    {{--<div class="media d-block mb-5" data-aos="fade-up"  data-aos-delay="400">--}}
                        {{--<figure>--}}
                            {{--<a href="#"><img src="img/news_1_large.jpg" alt="Image placeholder" class="img-fluid"></a>--}}
                        {{--</figure>--}}
                        {{--<div class="media-body">--}}
                            {{--<h3><a href="#">{{ $articles->last()->title }}</a></h3>--}}
                            {{--<p class="post-meta"><span><span class="fa fa-calendar"></span> April 22, 2018</span></p>--}}
                            {{--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto illo delectus</p>--}}
                            {{--<p><a href="#" class="btn btn-primary btn-outline-primary btn-sm">Read More</a></p>--}}
                        {{--</div>--}}
                    {{--</div> <!-- .media -->--}}
                {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div> <!-- .section -->--}}

@endsection