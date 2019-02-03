@extends('layouts.app')
@section('content')


    <div class="page-cover">
        <div class="page-cover-img"
             @if(!empty(Settings::getFile('categories_header_image')))
             style="background-image: url('{{ Settings::getFile('categories_header_image') }}')"
             @else
             style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                @endif>
            <div class="container">
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
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link active" id="pills-home-tab" data-toggle="pill" data-slug="slug brat" data-url="{{ route('menu.getProducts') }}" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link" id="pills-profile-tab" data-toggle="pill" data-slug="slug brat1" data-url="{{ route('menu.getProducts') }}" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link" id="pills-contact-tab" data-toggle="pill" data-slug="slug bra2" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>

                <div class="hr"></div>

                <div class="tab-content mt-5">
                    <div class="tab-pane menu-list-items-container fade show active" id="pills-home" role="tabpanel">

                        @include('categories::front.boxes.products')



                    </div>
                    <div class="tab-pane fade menu-list-item" id="pills-profile" role="tabpanel">CATEGORY 2</div>
                    <div class="tab-pane fade menu-list-item" id="pills-contact" role="tabpanel">CATEGORY 3</div>
                </div>

            </div>
        </div>

        <div id="my-modal" class="menu-modal">
            <div class="menu-modal-content">
                <div class="row justify-content-center mx-0">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-img-container px-0">
                        <img src="{{ asset('img/slider-1.jpg') }}" alt="" class="menu-item-modal-img">
                        <button class="menu-modal-close d-block d-md-none">
                            &#10005;
                        </button>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 col-12 menu-item-modal-info-container">
                        <div class="row">
                            <div class="col-12 menu-item-modal-title-container">
                                <h2 class="menu-item-modal-title">Pizza Margarita</h2>
                                <button class="menu-modal-close d-none d-md-block">
                                    &#10005;
                                </button>
                            </div>
                            <div class="col-12 menu-item-modal-desc-container">
                                <div class="menu-item-modal-desc">Уникално италианско тесто по избор, гарнирано с доматен сос, моцарела, гъби и щипка риган. МОЛЯ,ИЗБЕРЕТЕ ВАШЕТО ТЕСТО: ИТАЛИАНСКО КЛАСИЧЕСКО ТЕСТО; ПЪЛНОЗЪРНЕСТО ТЕСТО С ЛИМЕЦ; ИТАЛИАНСКО </div>
                            </div>
                            <div class="col-12 menu-item-modal-allergies-container">
                                <h5 class="menu-item-modal-allergies-title">Alergeni: </h5>
                                <ul class="menu-item-modal-allergies-list">
                                    <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                                    </li>
                                    <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2,
                                        </span>
                                    </li><li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                                    </li>
                                    <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2,
                                        </span>
                                    </li><li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello,
                                        </span>
                                    </li>
                                    <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
                                            hello2
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-options-container mb-3">
                                <select class="menu-item-modal-options" name="options">
                                    <option selected>{{ trans('categories::front.select-option') }}</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 menu-item-modal-qty-container mb-3">
                                <input class="menu-item-modal-qty" type="number" min="0" max="10" placeholder="Kol.">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 menu-item-modal-price-container mb-3">
                                <p class="menu-item-modal-price">20.00 lv.</p>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12 menu-item-modal-order-container mb-3">
                                <a href="#" class="menu-item-modal-order">
                                    <button>DOBAVI <i class="fa fa-cart-plus"></i></button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection