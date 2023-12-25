<?php
use App\Router;
use Illuminate\Support\Facades\Route;

Router::get('/','App\Controllers\HomeController@index');
Router::get('home','App\Controllers\HomeController@index');

Router::get('/product','App\Controllers\product\ProductController@showPage');
Router::post('/product-delete','App\Controllers\product\ProductController@product_delete');
Router::get('/add_product','App\Controllers\product\ProductController@showFormAdd');
Router::get('/update_product','App\Controllers\product\ProductController@showFormUpdate');
Router::post('/add_product','App\Controllers\product\ProductController@add_product');
Router::post('/update_product','App\Controllers\product\ProductController@update_product');


Router::get('/detail','App\Controllers\product\ProductController@showDetail');
Router::post('/detail','App\Controllers\Order\OrderController@AddCart');
// Router::post('/detail','App\Controllers\product\ProductController@AddCart');

Router::get('/login','App\Controllers\Auth\LoginController@showForm');
Router::post('/login','App\Controllers\Auth\LoginController@login');
Router::get('/logout','App\Controllers\Auth\LoginController@logout');
Router::get('/info','App\Controllers\Auth\LoginController@showInfo');

Router::get('/register','App\Controllers\Auth\RegisterController@showForm');
Router::post('/register','App\Controllers\Auth\RegisterController@register');

Router::get('/cart','App\Controllers\Order\OrderController@showCart');
Router::get('/cart/delete','App\Controllers\Order\OrderController@delete');
Router::post('/cart','App\Controllers\Order\OrderController@placeOrder');

Router::get('/changepassword','App\Controllers\Auth\ChangePasswordController@showForm');
Router::post('/changepassword','App\Controllers\Auth\ChangePasswordController@changepassword');
Router::post('/changepassword_confirm_verification','App\Controllers\Auth\ChangePasswordController@changepassword_confirm_verification');

Router::get('/recovery','App\Controllers\Auth\RecoveryController@showForm');
Router::post('/recovery','App\Controllers\Auth\RecoveryController@recovery');

Router::get('/confirm_verification','App\Controllers\Auth\RecoveryController@showFormConfirm');
Router::post('/confirm_verification','App\Controllers\Auth\RecoveryController@confirm_verification');

Router::post('/find','App\Controllers\product\ProductController@find');

Router::error(function(){
    echo "404 :: Page Not Found";
});