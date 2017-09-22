let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .version()
    .webpackConfig({
        resolve: {
            extensions: ['*', '.js', '.jsx', '.vue', '.ts', '.tsx'],
        },
    })
    .browserSync({
        files: [
            'routes/*.php',
            'app/*.php',
            'app/Http/**/*.php',
            'public/css/**/*.css',
            'public/js/**/*.js'
        ],
        proxy: 'calendar.dev',
        reloadOnRestart: true
    });