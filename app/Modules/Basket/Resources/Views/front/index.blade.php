@extends('layouts.app')
@section('content')
    @if (!empty($basket))
        <div class="full-cover">
            <div class="full-cover-img"
                 @if(!empty(Settings::getFile('basket_header_image')))
                 style="background-image: url('{{ Settings::getFile('basket_header_image') }}')"
                 @else
                 style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
                    @endif>

                <div class="address-section">
                    <div class="container a-s">
                        <div class="row justify-content-center align-items-center pb-3">
                            <div class="col-12 text-center my-3">
                                <h4 class="address-form-title">{{ trans('basket::front.enter-address') }}</h4>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                <label class="address-label" for="street">{{ trans('basket::front.street') }}</label>
                                <input type="text" class="address-input" name="data[street]" id="street">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-12 my-2">
                                <label class="address-label" for="city">{{ trans('basket::front.city') }}</label>
                                <input type="text" class="address-input" name="data[city]" id="city">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="phone">{{ trans('basket::front.phone') }}</label>
                                <input type="text" class="address-input" name="data[phone]" id="phone">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="ring">{{ trans('basket::front.ring') }}</label>
                                <input type="text" class="address-input" name="data[ring]" id="ring">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="floor">{{ trans('basket::front.floor') }}</label>
                                <input type="text" class="address-input" name="data[floor]" id="floor">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="block">{{ trans('basket::front.block') }}</label>
                                <input type="text" class="address-input" name="data[block]" id="block">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="apartment">{{ trans('basket::front.apartment') }}</label>
                                <input type="text" class="address-input" name="data[apartment]" id="apartment">
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-12 my-2">
                                <label class="address-label" for="entrance">{{ trans('basket::front.entrance') }}</label>
                                <input type="text" class="address-input" name="data[entrance]" id="entrance">
                            </div>
                        </div>

                        <div class="address-map-container">
                            {{--TUK SHTE E KARTATA--}}
                        </div>
                        <hr class="address-hr">
                        <div class="address-selected-location">
                            <h2 class="address-title">{{ trans('basket::front.address-for-delivery') }}:</h2>
                            <span>{{ trans('basket::front.address-not-selected') }}</span>
                        </div>
                    </div>

                </div>

                <div class="basket-section">
                    <div class="container b-s">
                        <h2 class="basket-title">{{ trans('basket::front.basket') }} <span>({{ $basket->getTotalQuantity() }})</span></h2>
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 basket-cart-container">
                                <ul class="basket-cart-item-list">
                                    @foreach($basket->products as $basketProduct)
                                        <li class="basket-cart-item">
                                            <div class="row justify-content-center align-items-center">
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-3 pb-lg-0 pb-md-3 pb-sm-3 pb-3">
                                                    <img class="basket-cart-item-img" src="{{ asset('img/img_6.jpg') }}"
                                                         alt="">
                                                </div>
                                                <div class="col-lg-5 col-md-10 col-sm-10 col-9 pl-0 pb-lg-0 pb-md-3 pb-sm-3 pb-3">
                                                    <a href="#" class="basket-cart-item-desc">
                                                        Lorem ipsum dolor sit amet, consectetur dumi koito ne zanam
                                                    </a>
                                                </div>
                                                <div class="col-lg-2 col-md-8 col-sm-5 col-5 px-lg-0 px-md-3">
                                                    <span class="basket-cart-item-price align-middle">
                                                        {{ currency($basketProduct->getPrice()) }}
                                                    </span>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-4">
                                                    <input type="number" class="basket-cart-item-qty" value="{{ $basketProduct->getQuantity() }}" min="1"
                                                           max="10"
                                                           name="qty">
                                                </div>
                                                <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                                                    <button class="basket-cart-item-remove">&#10005;</button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 basket-checkout-container">
                                <div class="checkout-box">
                                    <h1 class="checkout-price">{{ currency($basket->getTotalPrice()) }}</h1>
                                    <div class="hr"></div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-12 py-4 px-3 checkout-delivery-container">
                                            <span class="checkout-delivery">{{ trans('basket::front.delivery') }}
                                                :</span>
                                            <span class="checkout-delivery-value">{{ trans('basket::front.free') }}</span>
                                        </div>
                                        <div class="col-12 pb-4 px-3 checkout-dds-container">
                                            <span class="checkout-dds">{{ trans('basket::front.price-with-vat') }}
                                                :</span>
                                            <span class="checkout-dds-value">{{ currency($basket->getTotalPrice()) }}</span>
                                        </div>
                                    </div>
                                    <div class="checkout-order-container">
                                        <button class="checkout-order">{{ trans('basket::front.order') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endif


@endsection