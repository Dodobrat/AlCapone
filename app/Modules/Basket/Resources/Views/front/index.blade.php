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

    <div class="basket-section">
        <div class="container">
            <h2 class="basket-title">Количка <span>(4)</span></h2>
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 basket-cart-container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 basket-checkout-container">
                    <div class="checkout-box">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection