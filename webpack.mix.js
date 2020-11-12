const mix = require("laravel-mix");

require("laravel-mix-tailwind");

mix.webpackConfig(webpack => {
    return {
        plugins: [
            new webpack.ProvidePlugin({
                'window.NProgress': 'NProgress',
                'NProgress': 'NProgress',
            })
        ]
    };
});

mix.js("resources/js/app.js", "public/js/app.js")
    .sass("resources/sass/app.scss", "public/css/app.css")
    .tailwind("./tailwind.config.js")
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
}

mix.js("webapp/app.js", "public/webapp/js/app.js");
