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
                    <h2 class="page-title">{{ trans('basket::front.shopping-cart') }}</h2>
                    <div class="page-lead">
                        @if(!empty(Administration::getStaticBlock('cart')))
                            {!! Administration::getStaticBlock('cart') !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="address-section">

</div>

    <div class="basket-section">
        <div class="container">
            <h2 class="basket-title">Количка <span>(4)</span></h2>
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 basket-cart-container">
                    <ul class="basket-cart-item-list">
                        <li class="basket-cart-item">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-3 pb-lg-0 pb-md-3 pb-sm-3 pb-3">
                                    <img class="basket-cart-item-img" src="{{ asset('img/img_6.jpg') }}" alt="">
                                </div>
                                <div class="col-lg-5 col-md-10 col-sm-10 col-9 pl-0 pb-lg-0 pb-md-3 pb-sm-3 pb-3">
                                    <a href="#" class="basket-cart-item-desc">
                                        Lorem ipsum dolor sit amet, consectetur dumi koito ne zanam
                                    </a>
                                </div>
                                <div class="col-lg-2 col-md-8 col-sm-5 col-5 px-lg-0 px-md-3">
                                    <span class="basket-cart-item-price align-middle">
                                        21.40 лв.
                                    </span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                                    <input type="number" class="basket-cart-item-qty" value="1" min="1" max="10" name="qty">
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                                    <button class="basket-cart-item-remove">&#10005;</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 basket-checkout-container">
                    <div class="checkout-box">
                        <h2 class="checkout-price">137.00 lv.</h2>
                        <hr>
                        <p class="checkout-delivery">Bezlatna</p>
                        <p class="checkout-dds">137.00 lv.</p>
                        <div class="checkout-order-container">
                            <button class="checkout-order">oruchai</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection