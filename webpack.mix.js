const {mix} = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/assets/js')
    .sass('resources/assets/sass/app.scss', 'public/assets/css')
    .copy('resources/assets/images', 'public/assets/images')
    .version()
    .options({
        processCssUrls: false
    });

