<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* ======================== Admin page ==========================*/

Route::get('ad_userpage', function () {
    return view('adminpage.ad_userpage');
});

Route::get('ad_usereditpage', function () {
    return view('adminpage.ad_usereditpage');
});

Route::get('ad_categorypage', function () {
    return view('adminpage.ad_categorypage');
});

Route::get('ad_categoryeditpage', function () {
    return view('adminpage.ad_categoryeditpage');
});

Route::get('ad_blogpage', function () {
    return view('adminpage.ad_blogpage');
});

Route::get('ad_blogeditpage', function () {
    return view('adminpage.ad_blogeditpage');
});

Route::get('ad_productpage', function () {
    return view('adminpage.ad_productpage');
});

Route::get('ad_producteditpage', function () {
    return view('adminpage.ad_producteditpage');
});

Route::get('ad_orderpage', function () {
    return view('adminpage.ad_orderpage');
});

Route::get('ad_orderdetailpage', function () {
    return view('adminpage.ad_orderdetailpage');
});

// ============================ User page ===========================

Route::get('/', function () {
    return view('userpage.user_home');
});

Route::get('index', function () {
    return view('userpage.user_home');
});

Route::get('login', function () {
    return view('userpage.user_login');
});

Route::post('postLogin', 'App\Http\Controllers\LoginController@postLogin');

Route::post('postLogout', 'App\Http\Controllers\LoginController@postLogout');

Route::get('register', function () {
    return view('userpage.user_register');
});

Route::post('register', [
    'as' => 'dang-ky',
    'uses' => 'App\Http\Controllers\UserController@postRegister'
]);

Route::get('shop', function () {
    return view('userpage.user_shop');
});

Route::get('blog', function () {
    return view('userpage.user_blog');
});

Route::get('blog_details', function () {
    return view('userpage.user_blog_details');
});

Route::get('checkout', function () {
    return view('userpage.user_checkout');
});

Route::get('contact', function () {
    return view('userpage.user_contact');
});

Route::get('product', function () {
    return view('userpage.user_product');
});

Route::get('cart', function () {
    return view('userpage.user_cart');
});
