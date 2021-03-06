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
    .sass('resources/sass/app.scss', 'public/css')
    // .copy('node_modules/bootstrap-slider/dist/css/*', 'public/js/boostrapSlider')
    // .copy('node_modules/dropzone/dist/dropzone.css', 'public/css/dropzone')
    // .copy('node_modules/jquery-ui/ui/widgets/sortable.js', 'public/js/sortable')
    .browserSync({
        proxy: 'http://127.0.0.1:8000/',
        browser: 'chrome'
    });
   mix.copyDirectory('node_modules/vue-number-input-spinner', 'resources/js/components/vue-number-input-spinner');
   mix.copyDirectory('resources/css', 'public/css');
   // mix.copyDirectory('resources/flaticons', 'public/flaticons');
   // mix.copyDirectory('resources/icons', 'public/icons');
   // mix.copyDirectory('resources/images', 'public/images');
