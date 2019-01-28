@extends('layouts.app')
@section('content')


<div class="site-wrap">

    <div class="main-wrap">
        <div class="cover_1 cover_sm">
            <div class="img_bg" style="background-image: url('{{ asset('img/slider-1.jpg') }}');" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7" data-aos="fade-up">
                            <h2 class="heading">{{ trans('index::front.menu') }}</h2>
                            <p class="lead">
                                @if(!empty(Administration::getStaticBlock('menu')))
                                    {!! Administration::getStaticBlock('menu') !!}
                                @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .cover_1 -->

        <div class="menu-list-section" data-aos="fade-down">
            <h2 class="menu-list-section-title text-center">
                {{ trans('categories::front.menu-with-prices') }}
            </h2>
            <div class="container">

                <ul class="nav nav-pills mb-3 menu-category-list justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link active" id="pills-home-tab" data-toggle="pill" data-slug="slug brat" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link" id="pills-profile-tab" data-toggle="pill" data-slug="slug brat1" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item menu-category-item">
                        <a class="nav-link menu-category-link" id="pills-contact-tab" data-toggle="pill" data-slug="slug bra2" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                    </li>
                </ul>

                <div class="tab-content mt-5">
                    <div class="tab-pane menu-list-items-container fade show active" id="pills-home" role="tabpanel">

                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-2 my-2">

                                <div class="card menu-list-item">
                                    <img src="{{ asset('img/slider-1.jpg') }}" class="card-img-top menu-list-item-card-img" alt="" data-modal="modal brat">
                                    <div class="card-body menu-list-item-card-body">
                                        <h5 class="card-title menu-list-item-card-title">Маргарита</h5>
                                        <div class="menu-list-item-card-desc-container">
                                            <p class="card-text menu-list-item-card-desc">доматен сос, моцарела, допълнително моцарела</p>
                                        </div>
                                        <hr>
                                        <div class="menu-list-item-card-add-btn-container">
                                            <a href="#" class="btn menu-list-item-card-add-btn" data-modal="modal buton">добави</a>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="tab-pane fade menu-list-item" id="pills-profile" role="tabpanel">CATEGORY 2</div>
                    <div class="tab-pane fade menu-list-item" id="pills-contact" role="tabpanel">CATEGORY 3</div>
                </div>

            </div>
        </div>

        <div id="my-modal" class="menu-modal">
            <div class="menu-modal-content">
                <button class="menu-modal-close">
                    &#10005;
                </button>
                <div class="row justify-content-center mx-0">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-img-container px-0">
                        <img src="{{ asset('img/slider-1.jpg') }}" alt="" class="menu-item-modal-img">
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 col-12 menu-item-modal-info-container">
                        <div class="row">
                            <div class="col-12 menu-item-modal-title-container">
                                <h2 class="menu-item-modal-title">Pizza Margarita</h2>
                            </div>
                            <div class="col-12 menu-item-modal-desc-container">
                                <div class="menu-item-modal-desc">Уникално италианско тесто по избор, гарнирано с доматен сос, моцарела, гъби и щипка риган. МОЛЯ,ИЗБЕРЕТЕ ВАШЕТО ТЕСТО: ИТАЛИАНСКО КЛАСИЧЕСКО ТЕСТО; ПЪЛНОЗЪРНЕСТО ТЕСТО С ЛИМЕЦ; ИТАЛИАНСКО ПУХКАВО ТЕСТО MR.PIZZA; И ГО НАПИШЕТЕ В "КОМЕНТАР КЪМ ПОРЪЧКАТА".</div>
                            </div>
                            <div class="col-12 menu-item-modal-allergies-container">
                                <h5 class="menu-item-modal-allergies-title">Alergeni: </h5>
                                <ul class="menu-item-modal-allergies-list">
                                    <li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
hello
                                        </span>
                                    </li><li class="menu-item-modal-allergies-item">
                                        <span class="menu-item-modal-allergy">
hello2
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 col-12 menu-item-modal-options-container mb-3">
                                <select class="menu-item-modal-options" name="options">
                                    <option selected>Open this select menu</option>
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

    </div> <!-- .main-wrap -->

</div>


@endsection