@extends('layouts.app')
@section('content')

<div class="full-cover">
    <div class="full-cover-img"
        @if(!empty(Settings::getFile('basket_header_image')))
            style="background-image: url('{{ Settings::getFile('basket_header_image') }}')"
        @else
            style="background-image: url('{{ asset('img/slider-1.jpg') }}');"
        @endif>

        <div class="address-section">
            <div class="container a-s">
                <label class="address-label" for="location">{{ trans('basket::front.choose-loc') }}  <i class="fa fa-map-marker"></i></label>
                <input type="text" class="address-input" name="location">
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

        @include('basket::front.boxes.basket')




    </div>
</div>


@endsection