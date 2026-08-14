let mix = require('laravel-mix');
let path = require('path');

mix.setResourceRoot('../');
mix.setPublicPath('dist');

mix.webpackConfig({
    watchOptions: { ignored: [
        path.posix.resolve(__dirname, './node_modules'),
        path.posix.resolve(__dirname, './dist/css'),
        path.posix.resolve(__dirname, './dist/js')
    ] }
});

mix.js('src/js/app.js', 'js');
mix.js('src/js/jquery.js', 'js');

mix.postCss("src/css/app.css", "css");

mix.postCss("src/css/editor-style.css", "css");

mix.browserSync({
    proxy: 'dev-mozaique.local',
});

if (mix.inProduction()) {
    mix.version();
} else {
    mix.options({ manifest: false });
}
