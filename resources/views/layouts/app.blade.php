<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AlCapone') }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">

    <link href="{{ mix('css/theme.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('img/img_2.jpg') }}">
</head>
<body>
<div id="app"></div>

<nav class="navigation">
    <input type="checkbox" id="nav" class="hidden">
    <label for="nav" class="nav-btn">
        <i></i>
        <i></i>
        <i></i>
    </label>
    <div class="logo">
        <a href="{{ route('index') }}">{{ config('app.name', 'AlCapone') }}</a>
    </div>
    <div class="nav-wrapper">
        <ul>
            <li><a href="{{ route('index') }}">{{ trans('front.home') }}</a></li>
            <li><a href="{{ route('menu.index') }}">{{ trans('front.menu') }}</a></li>
            <li><a href="{{ route('blog.index') }}">{{ trans('front.blog') }}</a></li>
            <li><a href="{{ route('contacts.index') }}">{{ trans('front.contacts') }}</a></li>
            <li><a id="basket"><i class="fa fa-shopping-basket"><span class="badge">4</span></i></a></li>
        </ul>
    </div>
</nav>

<div class="shopping-cart-wrapper">
        @include('boxes.global-basket')
</div>
{{--{{ dd($basket) }}--}}

@yield('content')

<footer>
    <button class="back-to-top">&#10092;</button>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 d-none d-lg-block">
                <ul class="site-map">
                    <li><a href="{{ route('index') }}">{{ trans('front.home') }}</a></li>|
                    <li><a href="{{ route('menu.index') }}">{{ trans('front.menu') }}</a></li>|
                    <li><a href="{{ route('blog.index') }}">{{ trans('front.blog') }}</a></li>|
                    <li><a href="{{ route('contacts.index') }}">{{ trans('front.contacts') }}</a></li>|
                    <li><a href="{{ route('basket.index') }}">{{ trans('front.basket') }}</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-12">
                <div class="footer-address">
                    80, ulitsa "Tsar Boris III", 1532 Kazichene
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="footer-phone">
                    <span class="footer-phone-text">{{ trans('front.phone-for-delivery') }}</span>:
                    <span class="footer-p">0885855379</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-text">{{ trans('front.copyright') }} &copy;</div>

<div id="my-modal" class="menu-modal">
    @include('categories::front.boxes.product-view')
</div>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#9C4B65"/></svg></div>

<script src="{{ mix('js/theme.js') }}"></script>
<script>
    let modal = document.querySelector('#my-modal');

    function closeModal() {
        modal.style.display = 'none';
    }

    function openModal(id, url) {
        let productId = id;
        let productUrl = url;

        $.ajaxSetup({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: productUrl,
            method: 'post',
            data: {
                product_id: productId,
            },

            success: function(result) {
                if (result.errors.length != 0) {
                    $('.alert-danger').html('');

                    $.each(result.errors, function (key, value) {

                    });
                } else {
                    modal.style.display = 'flex';
                    modal.innerHTML = result.product_modal;
                }
            }
        });
    }

    function getSelectedOption() {
        let selected = document.querySelector(".menu-item-modal-options");
        let price = $('option:selected').data('price');
        let qty = document.querySelector('.menu-item-modal-qty').value;
        let finalPrice = parseFloat(price * qty).toFixed(2);
        let finalPriceBox = document.querySelector('.menu-item-modal-price');
        let currency = `{{ currency()->getUserCurrency() }}`;

        if (currency == 'BGN') {
            finalPrice = finalPrice + ' лв.';
        }
        finalPriceBox.innerHTML = finalPrice;
    }

    function addToCart() {
        let productRoute = document.querySelector('.menu-item-modal-order').dataset.product_route;
        let productId = document.querySelector('.menu-item-modal-order').dataset.product_id;
        let productOption = $('option:selected').val();
        let productQty = document.querySelector('.menu-item-modal-qty').value;

        $.ajaxSetup({
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: productRoute,
            method: 'post',
            data: {
                product_id: productId,
                product_option_id: productOption,
                quantity: productQty,
            },

            success: function(result) {
                console.log(result);
                if (result.errors.length != 0) {
                    $('.alert-danger').html('');

                    $.each(result.errors, function (key, value) {

                    });
                } else {
                    modal.style.display = 'flex';
                    modal.innerHTML = result.product_modal;
                }
            }
        });
        console.log(productId, productOption, productQty);
    }
</script>
@yield('js')
</body>
</html>