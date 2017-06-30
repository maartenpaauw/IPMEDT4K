const { mix } = require('laravel-mix');

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

// Disable notifications.
mix.disableNotifications();

// User Browser Sync.
mix.browserSync({
    proxy: process.env.MIX_BROWSER_SYNC_DOMAIN
});

// Mix javascript and sass.
mix
    .js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/dashboard.js', 'public/js')
    .js('resources/assets/js/monitor.js', 'public/js')
    .js('resources/assets/js/mobile.js', 'public/js')
    .js('resources/assets/js/statistics.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/monitor.scss', 'public/css')
    .sass('resources/assets/sass/dashboard.scss', 'public/css')
    .sass('resources/assets/sass/login.scss', 'public/css')
    .sass('resources/assets/sass/mobile.scss', 'public/css');
