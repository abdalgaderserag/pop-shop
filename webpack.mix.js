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
    .sass('resources/sass/default/shared.scss', 'public/css/style/shared')
    .sass('resources/sass/default/header.scss', 'public/css/style/parts')
    .sass('resources/sass/default/footer.scss', 'public/css/style/parts')
    .sass('resources/sass/default/item-view.scss', 'public/css/style/profile')
    .sass('resources/sass/default/log.scss', 'public/css/style/log')
    .sass('resources/sass/default/items.scss', 'public/css/style');

