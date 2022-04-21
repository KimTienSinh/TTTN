<?php

use App\Http\Controllers\UserController;
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
Route::get('ad_home', function () {
    return view('adminpage.ad_home');
});

Route::get('ad_userpage', [
    'as' => 'danh-sach-user',
    'uses' => 'App\Http\Controllers\PageController@getUserList'
]);

Route::get('ad_usereditpage', function () {
    return view('adminpage.ad_usereditpage');
});


Route::get('delete_user/{id_user}', [
    'as' => 'xoa-user',
    'uses' => 'App\Http\Controllers\UserController@getDeleteUser'
]);

Route::get('ad_usereditpage/{id_user}', [
    'as' => 'chinh-User',
    'uses' => 'App\Http\Controllers\UserController@editUser'
]);

Route::post('updateUser/{id}', [
    'as' => 'ad_updateUser',
    'uses' => 'App\Http\Controllers\UserController@updateUser'
]);


Route::post('insert_user', [
    'as' => 'them-user',
    'uses' => 'App\Http\Controllers\UserController@postInsertUser'
]);

//------------------------------- START Category------------------//
Route::get('ad_categorypage', [
    'as' => 'danh-sach-danh-muc',
    'uses' => 'App\Http\Controllers\PageController@getCategoryList'
]);
Route::get('ad_categoryeditpage', [
    'as' => 'parent-danh-muc',
    'uses' => 'App\Http\Controllers\CategoryController@getCategoryDropdown'
]);
Route::get('ad_categoryeditpage/{id_categories}', [
    'as' => 'chinh-danh-muc',
    'uses' => 'App\Http\Controllers\CategoryController@getEditCategory'
]);
Route::post('insert_category', [
    'as' => 'them-danh-muc',
    'uses' => 'App\Http\Controllers\CategoryController@postInsertCategory'
]);
Route::post('update_category/{id_categories}', [
    'as' => 'update-danh-muc',
    'uses' => 'App\Http\Controllers\CategoryController@postUpdateCategory'
]);
Route::get('delete_categories/{id_categories}', [
    'as' => 'xoa-danh-muc',
    'uses' => 'App\Http\Controllers\CategoryController@getDeleteCategory'
]);
//-------------------------------END Category----------------------//

//-------------------------------START Blog----------------------//

Route::get('ad_blogpage', [
    'as' => 'danh-sach-bai-viet',
    'uses' => 'App\Http\Controllers\PageController@getBlogList'
]);

Route::get('ad_blogeditpage', [
    'as' => 'lay-category-bai-viet',
    'uses' => 'App\Http\Controllers\BlogController@getDropdownBlog'
]);
Route::post('insert_blog', [
    'as' => 'them-bai-viet',
    'uses' => 'App\Http\Controllers\BlogController@postInsertBlog'
]);
Route::get('ad_blogeditpage/{id_blog}', [
    'as' => 'chi-trang-danh-muc',
    'uses' => 'App\Http\Controllers\BlogController@getEditBlog'
]);
Route::post('update_blog/{id_blog}', [
    'as' => 'update-bai-viet',
    'uses' => 'App\Http\Controllers\BlogController@postUpdateBlog'
]);
Route::get('delete_blog/{id_blog}', [
    'as' => 'xoa-bai-viet',
    'uses' => 'App\Http\Controllers\BlogController@getDeleteBlog'
]);

//-------------------------------END Blog----------------------//


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

Route::get('userEdit', function () {
    return view('userpage.user_edit');
});

Route::post('userEdit/{id}', [
    'as' => 'userEdit',
    'uses' => 'App\Http\Controllers\UserController@userEdit'
]);

/////////////////LOGIN REGISTER LOGOUT////////////////////////////////////////////
Route::post('postLogin', 'App\Http\Controllers\UserController@postLogin');

Route::post('postLogout', 'App\Http\Controllers\UserController@postLogout');

Route::get('register', function () {
    return view('userpage.user_register');
});

Route::post('register', [
    'as' => 'dang-ky',
    'uses' => 'App\Http\Controllers\UserController@postRegister'
]);
////////////////////////////////////////////////////////////////////////////////

Route::get('shop', function () {
    return view('userpage.user_shop');
});
//-------------------------------START Blog----------------------//
Route::get('blog', [
    'as' => 'danh-sach-bai-viet-userpage',
    'uses' => 'App\Http\Controllers\PageController@getBlogListUserPage'
]);

Route::get('blog_details', function () {
    return view('userpage.user_blog_details');
});
Route::get('blog_details/{id_blog}', [
    'as' => 'chi-bai-viet-userpage',
    'uses' => 'App\Http\Controllers\BlogController@getBlogDetailUserPage'
]);
//-------------------------------END Blog----------------------//

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
