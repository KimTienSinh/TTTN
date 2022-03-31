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
Route::get('/', function () {
    return view('adminpage.ad_home');
});

Route::get('userpage', function () {
    return view('adminpage.ad_userpage');
});

Route::get('usereditpage', function () {
    return view('adminpage.ad_usereditpage');
});

Route::get('categorypage', function () {
    return view('adminpage.ad_categorypage');
});

Route::get('categoryeditpage', function () {
    return view('adminpage.ad_categoryeditpage');
});

Route::get('blogpage', function () {
    return view('adminpage.ad_blogpage');
});

Route::get('blogeditpage', function () {
    return view('adminpage.ad_blogeditpage');
});

Route::get('productpage', function () {
    return view('adminpage.ad_productpage');
});

Route::get('producteditpage', function () {
    return view('adminpage.ad_producteditpage');
});

Route::get('orderpage', function () {
    return view('adminpage.ad_orderpage');
});

Route::get('orderdetailpage', function () {
    return view('adminpage.ad_orderdetailpage');
});
