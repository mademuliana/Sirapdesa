const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('bower_components/material-design-lite/material.min.css','public/css/')
		.copy('bower_components/material-design-lite/material.min.js','public/js/')
		.copy('bower_components/mdl-stepper/stepper.min.css','public/css/')
		.copy('bower_components/mdl-stepper/stepper.min.js','public/js/');
	
});
