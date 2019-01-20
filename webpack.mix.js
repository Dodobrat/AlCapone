const {mix} = require('laravel-mix');

mix.webpackConfig({
    module: {
        rules: [
            { parser: { amd: false } }
        ]
    }
 });

mix.js([
    'resources/assets/js/app.js',
    'resources/assets/js/jquery-migrate-3.0.1.min.js',
    'resources/assets/js/jquery-3.2.1.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/owl.carousel.min.js',
    'resources/assets/js/jquery.waypoints.min.js',
    'resources/assets/js/bootstrap-datepicker.js',
    'resources/assets/js/jquery.timepicker.min.js',
    'resources/assets/js/main.js',
    ], 'public/js/theme.js')

    .styles([
        'resources/assets/sass/app.scss',
        'resources/assets/css/bootstrap.css',
        'resources/assets/css/animate.css',
        'resources/assets/css/owl.carousel.min.css',
        'resources/assets/css/magnific-popup.css',
        'resources/assets/css/aos.css',
        'resources/assets/css/bootstrap-datepicker.css',
        'resources/assets/css/jquery.timepicker.css',
        'resources/assets/css/style.css',
    ],'public/css/theme.css')

    .copy('resources/assets/images', 'public/img', true)
    .copy('resources/assets/fonts', 'public/fonts', true)
    .version()
    .options({
        processCssUrls: false
    });