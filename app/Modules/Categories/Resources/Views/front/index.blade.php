@extends('layouts.app')
@section('content')


    <div class="page-cover">
        <div class="page-cover-img rellax"
             @if(!empty(Settings::getFile('categories_header_image')))
             style="background-image: url('{{ Settings::getFile('categories_header_image') }}')"
             @else
             style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                @endif data-rellax-speed="3">
            <div class="container rellax" data-rellax-speed="-5">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12 col-12" data-aos="fade-up">
                        <h2 class="page-title">{{ trans('categories::front.menu') }}</h2>
                        <div class="page-lead">
                            @if(!empty(Administration::getStaticBlock('menu')))
                                {!! Administration::getStaticBlock('menu') !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="menu-list-section" data-aos="fade-down">

            <h2 class="menu-list-section-title text-center">
                {{ trans('categories::front.menu-with-prices') }}
            </h2>
            <div class="container">

                <ul class="nav nav-pills mb-3 menu-category-list justify-content-center" id="pills-tab" role="tablist">

                    @foreach($categories as $category)
                        <li class="nav-item menu-category-item">
                            <a class="nav-link menu-category-link @if ($current_category->slug == $category->slug) active @endif"
                               id="{{ $category->slug }}"
                               data-toggle="pill"
                               data-slug="{{ $category->slug }}"
                               data-url="{{ route('menu.getProducts') }}"
                               data-menu="{{ route('menu.index') }}"
                               href="#menu_category_{{ $category->slug }}"
                               role="tab"
                               aria-controls="menu_category_{{ $category->slug }}"
                               aria-selected="true">
                                {{ $category->title }}
                            </a>
                        </li>
                    @endforeach

                </ul>

                <div class="hr"></div>

                <div class="tab-content mt-5" id="products-container">

                    <div class="load-container">
                        <div id="loading-image" class="loader"></div>
                    </div>

                        @include('categories::front.boxes.products', ['category' => $current_category])

                </div>

            </div>
        </div>

    <div id="my-modal" class="menu-modal">
        @include('categories::front.boxes.product-view')
    </div>

@endsection


