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
            <li><a href="#">{{ trans('front.menu') }}</a></li>
            <li><a href="{{ route('blog.index') }}">{{ trans('front.blog') }}</a></li>
            <li><a href="{{ route('contacts.index') }}">{{ trans('front.contacts') }}</a></li>
            <li><a href="#"><i class="fa fa-shopping-basket"><span class="badge">4</span></i></a></li>
        </ul>
    </div>
</nav>

@yield('content')

<footer>
    <div class="site-footer">
        <div class="container">
            <div class="row small-gutters mb-5">
                <div class="col-md-6 col-lg-3 mb-5">
                    <div class="footer-widget">
                        <h3>Diner Restaurant</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel neque, odio illum. Est minima sint minus sunt ducimus.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-5">
                    <div class="footer-widget">
                        <h3>Lunch Service</h3>
                        <p>Booking from 12:00pm - 1:30pm</p>
                        <h3>Dinner Service</h3>
                        <p>Everyday: <br> Booking from 6:00pm - 9:00pm</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-5">
                    <div class="footer-widget">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><a href="#">Help &amp; Support</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Get in Touch</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-5">
                    <div class="footer-widget footer-contact-widget">

                        <h3>Subscribe</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <form action="" class="form-subscribe mb-5">
                            <div class="form-group form-field">
                                <input type="submit" value="Send" class="btn btn-primary">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </form>

                        <h3>Contact Us</h3>
                        <p class="contact-email">info@yourdomain.com</p>
                        <p class="contact-phone">1-444-123-9829</p>


                    </div>
                </div>
            </div>
        </div>

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