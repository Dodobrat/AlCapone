@extends('layouts.app')
@section('content')

<div class="page-cover">
    <div class="page-cover-img"
        @if(!empty(Settings::getFile('basket_cover')))
            style="background-image: url('{{ Settings::getFile('basket_cover') }}')"
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

TOVE E KOLICHKA

@endsection