const mix = require('laravel-mix')


mix.js('resources/js/app.js', 'public/build/js')
    .postCss('resources/css/main.css', 'public/build/css', [
        require("tailwindcss")
    ])
    .postCss('resources/css/component.css', 'public/build/css',[])
    .postCss('resources/css/animate.css', 'public/build/css',[])

    .extract();
