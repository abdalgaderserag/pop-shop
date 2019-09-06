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
    .sass('resources/sass/shared.scss', 'public/css/shared')
    .sass('resources/sass/header.scss', 'public/css/parts')
    .sass('resources/sass/item-view.scss', 'public/css/profile')
    .sass('resources/sass/items.scss', 'public/css');

