<?php
use App\Router;

Router::get('/','App\Controllers\HomeController@index');
Router::get('home','App\Controllers\HomeController@index');

Router::get('/product','App\Controllers\HomeController@product');
Router::get('/register','App\Controllers\HomeController@register');
Router::get('/login','App\Controllers\HomeController@login');


Router::error(function(){
    echo "404 :: Page Not Found";
});