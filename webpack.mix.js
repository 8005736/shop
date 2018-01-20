let mix = require('laravel-mix');

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

mix.js('resources/assets/js/script.js', 'public/js/script.js')
   // .less('resources/assets/css/__defaults.less', 'public/css/__defaults.css')
   .less('resources/assets/css/style.less', 'public/css/style.css')
   .copy('resources/assets/css/jquery.jgrowl.min.css', 'public/css/jquery.jgrowl.min.css')
   .version();
