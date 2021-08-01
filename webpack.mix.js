const mix = require("laravel-mix");

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
// webpack 5 caveats
mix.webpackConfig({
    resolve: {
        fallback: {
            stream: false,
            path: false,
            constants: false,
            fs: false,
            module: false
        }
    }
});
mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css/main.css", [
        require("tailwindcss")
    ])
    .sass("resources/sass/app.scss", "public/css/ext.css")
    .extract(["vue"]);

if (mix.inProduction()) {
    mix.version();
} else {
    // eslint-disable-next-line no-process-env
    mix.browserSync(process.env.APP_URL);
}
