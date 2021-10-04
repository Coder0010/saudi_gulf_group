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

mix
    .styles([
        'theme/css/owl.carousel.min.css',
        'theme/css/owl.theme.default.min.css',
        'theme/css/bootstrap.min.css',
        'theme/css/ekko-lightbox.css',
        'theme/css/style.css',
        'theme/css/aos.css',
        'theme/css/select2.css',
    ], 'public/frontend/compiled.css')
    .scripts([
        'theme/js/jquery.js',
        'theme/js/owl.carousel.min.js',
        'theme/js/popper.min.js',
        'theme/js/bootstrap.min.js',
        'theme/js/aos.js',
        'theme/js/ekko-lightbox.min.js',
        'theme/js/select2.js',
        'theme/js/plugin.js',
    ], 'public/frontend/compiled.js')

    .copyDirectory('node_modules/font-awesome/fonts', 'public/fonts')
    .copyDirectory('theme/images', 'public/frontend/images')

    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')

    .options({ processCssUrls: false, })
    .version()
    .sourceMaps()
    ;

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.css$\.scss$/i,
                use: ['style-loader', 'css-loader'],
            },
        ],
    },
});
