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
    .sass('resources/sass/default/items.scss', 'public/css/style')
    .sass('resources/sass/dark/shared.scss', 'public/css/dark/shared')
    .sass('resources/sass/dark/header.scss', 'public/css/dark/parts')
    .sass('resources/sass/dark/footer.scss', 'public/css/dark/parts')
    .sass('resources/sass/dark/item-view.scss', 'public/css/dark/profile')
    .sass('resources/sass/dark/log.scss', 'public/css/dark/log')
    .sass('resources/sass/dark/items.scss', 'public/css/dark');

