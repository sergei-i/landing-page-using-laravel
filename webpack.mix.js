const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
        'resources/assets/css/bootstrap.min.css',
        'resources/assets/css/style.css',
        'resources/assets/css/font-awesome.css',
        'resources/assets/css/animate.css'
    ],
    'public/assets/css/main.css');

mix.scripts([
    'resources/assets/js/respond-1.1.0.min.js',
    'resources/assets/js/html5shiv.js',
    'resources/assets/js/html5element.js',
    'resources/assets/js/jquery-1.11.0.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/jquery-scrolltofixed.js',
    'resources/assets/js/jquery.nav.js',
    'resources/assets/js/jquery.easing.1.3.js',
    'resources/assets/js/jquery.isotope.js',
    'resources/assets/js/wow.js',
    'resources/assets/js/custom.js',
    'resources/assets/js/ckeditor.js',
    'resources/assets/js/bootstrap-filestyle.min.js',
], 'public/assets/js/main.js');

mix.copy('resources/assets/fonts', 'public/assets/fonts');
mix.copy('resources/assets/img', 'public/assets/img');
mix.copy('resources/assets/favicon.png', 'public/assets/favicon.png');
