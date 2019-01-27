<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AlCapone') }}</title>

    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
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
        <a href="{{ route('index') }}">BRAND</a>
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
    <div class="shopping-cart-container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <h4 class="shopping-cart-title">{{ trans('front.order') }}:</h4>
                <button id="basket-m">&#10230;</button>
            </div>
        </div>

        <ul class="shopping-items">


            <li class="shopping-item">


                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-3">
                        <img class="asking-food-img" src="{{ asset('img/img_6.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-9">
                        <a href="#" class="asking-food-desc">
                            Lorem ipsum dolor sit amet, consectetur dumi koito ne zanam
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                        <p class="asking-food-price">
                            {{ trans('front.price') }}
                            <span>20.00 лв.</span>
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-4">
                        <input type="number" min="1" max="6" class="asking-food-qty" placeholder="{{ trans('front.qty') }}" value="">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-2">
                        <button class="asking-food-remove">&#10005;</button>
                    </div>
                </div>

            </li>


        </ul>
        <div class="shopping-bottom-section">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 col-md-7 col-sm-7 col-6">
                    <span class="total-txt">Общо: </span><span class="total-price">123.53 lv.</span>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-6">
                    <a href="#" class="go-to-checkout">
                        <button>{{ trans('front.checkout') }}</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')

<footer>
    <div class="container">

    </div>
</footer>

<div class="site-footer-copyright">
    <div class="container">
        <div class="row">

            <p class="footer-text col-md-12">{{ trans('front.copyright') }} &copy;</p>
        </div>
    </div>
</div>

<!-- loader -->
<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

<script src="{{ mix('js/theme.js') }}"></script>
</body>
</html>