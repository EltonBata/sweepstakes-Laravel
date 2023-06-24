const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [require('autoprefixer')],
    })
    .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js')
    .copy('node_modules/bootstrap/dist/css/bootstrap.css', 'public/css/app.css')
    .webpackConfig({
        resolve: {
            alias: {
                jquery: 'jquery/src/jquery',
                'popper.js': 'popper.js/dist/umd/popper.js',
            },
        },
    });

