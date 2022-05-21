<?php

use App\Http\Controllers\UserController;
use Facade\FlareClient\View;
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

Route::get('delete_user', [
    'as' => 'xoa-user',
    'uses' => 'App\Http\Controllers\UserController@getDeleteUser'
]);

Route::get('ad_usereditpage/{id}', [
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
Route::get('delete_categories', [
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
Route::get('delete_blog', [
    'as' => 'xoa-bai-viet',
    'uses' => 'App\Http\Controllers\BlogController@getDeleteBlog'
]);
//-------------------------------END Blog----------------------//


//-------------------------------START PRODUCT----------------------//


Route::get(
    'ad_Product',
    [
        'as' => 'ad_getAllProduct',
        'uses' => 'App\Http\Controllers\PageController@ad_getAllProduct'
    ]
);

Route::get(
    'ad_ProductEditPage',
    [
        'as' => 'ad_getProductEditPage',
        'uses' => 'App\Http\Controllers\PageController@getProductEditPage'
    ]
);

Route::post(
    'ad_ProductEditPage',
    [
        'as' => 'ad_getProductEditPage',
        'uses' => 'App\Http\Controllers\PageController@getProductEditPage'
    ]
);

Route::post(
    'insertProduct',
    [
        'as' => 'ad_insertProduct',
        'uses' => 'App\Http\Controllers\ProductController@insertProduct'
    ]
);

Route::post(
    'editProduct/{id}',
    [
        'as' => 'ad_insertProduct',
        'uses' => 'App\Http\Controllers\ProductController@editProduct'
    ]
);

Route::post(
    'deletedProduct',
    [
        'as' => 'xoa-product',
        'uses' => 'App\Http\Controllers\ProductController@deletedProduct'
    ]
);

//-------------------------------END PRODUCT----------------------//



//-------------------------------START Voucher----------------------//

Route::get('ad_voucherpage', [
    'as' => 'danh-sach-giam-gia',
    'uses' => 'App\Http\Controllers\PageController@getVoucherList'
]);

Route::get('ad_vouchereditpage', function () {
    return view('adminpage.ad_vouchereditpage');
});

Route::post('ad_vouchereditpage', [
    'as' => 'them-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@postInsertVoucher'
]);

Route::get('ad_vouchereditpage/{id_voucher}', [
    'as' => 'chi-trang-voucher-edit',
    'uses' => 'App\Http\Controllers\VoucherController@getEditVoucher'
]);

Route::post('update_voucher/{id_voucher}', [
    'as' => 'chinh-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@postUpdateVoucher'
]);

Route::get('delete_voucher', [
    'as' => 'xoa-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@getDeleteVoucher'
]);
//-------------------------------END Voucher----------------------//

//-------------------------------START Slider----------------------//
Route::get('ad_slidepage', [
    'as' => 'danh-sach-slide',
    'uses' => 'App\Http\Controllers\PageController@getSlideList'
]);

Route::get('ad_slideeditpage', function () {
    return view('adminpage.ad_slideeditpage');
});

Route::post('ad_slideeditpage', [
    'as' => 'them-slide',
    'uses' => 'App\Http\Controllers\SlideController@postInsertSlide'
]);

Route::get('ad_slideeditpage/{id_slide}', [
    'as' => 'chi-trang-edit-slide',
    'uses' => 'App\Http\Controllers\SlideController@getEditSlide'
]);

Route::post('update_slide/{id_slide}', [
    'as' => 'sua-slide',
    'uses' => 'App\Http\Controllers\SlideController@postUpdateSlide'
]);

Route::get('delete_slide', [
    'as' => 'xoa-slide',
    'uses' => 'App\Http\Controllers\SlideController@getDeleteSlide'
]);

//-------------------------------END Slider----------------------//

//-------------------------------START Voucher----------------------//

Route::get('ad_voucherpage', [
    'as' => 'danh-sach-giam-gia',
    'uses' => 'App\Http\Controllers\PageController@getVoucherList'
]);

Route::get('ad_vouchereditpage', function () {
    return view('adminpage.ad_vouchereditpage');
});

Route::post('ad_vouchereditpage', [
    'as' => 'them-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@postInsertVoucher'
]);

Route::get('ad_vouchereditpage/{id_voucher}', [
    'as' => 'chi-trang-voucher-edit',
    'uses' => 'App\Http\Controllers\VoucherController@getEditVoucher'
]);

Route::post('update_voucher/{id_voucher}', [
    'as' => 'chinh-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@postUpdateVoucher'
]);

Route::get('delete_voucher/{id_voucher}', [
    'as' => 'xoa-voucher',
    'uses' => 'App\Http\Controllers\VoucherController@getDeleteVoucher'
]);
//-------------------------------END Voucher----------------------//

//-------------------------------START Slider----------------------//
Route::get('ad_slidepage', [
    'as' => 'danh-sach-slide',
    'uses' => 'App\Http\Controllers\PageController@getSlideList'
]);

Route::get('ad_slideeditpage', function () {
    return view('adminpage.ad_slideeditpage');
});

Route::post('ad_slideeditpage', [
    'as' => 'them-slide',
    'uses' => 'App\Http\Controllers\SlideController@postInsertSlide'
]);

Route::get('ad_slideeditpage/{id_slide}', [
    'as' => 'chi-trang-edit-slide',
    'uses' => 'App\Http\Controllers\SlideController@getEditSlide'
]);

Route::post('update_slide/{id_slide}', [
    'as' => 'sua-slide',
    'uses' => 'App\Http\Controllers\SlideController@postUpdateSlide'
]);

Route::get('delete_slide/{id_slide}', [
    'as' => 'xoa-slide',
    'uses' => 'App\Http\Controllers\SlideController@getDeleteSlide'
]);

//-------------------------------END Slider----------------------//

Route::get('ad_productpage', function () {
    return view('adminpage.ad_productpage');
});

Route::get('ad_producteditpage', function () {
    return view('adminpage.ad_producteditpage');
});


//-------------------------------STASRT ORDER----------------------//
Route::get('ad_orderpage', [
    'as' => 'danh-sach-order',
    'uses' => 'App\Http\Controllers\OrderController@getOrderList'
]);

Route::post('change_status/{id_order}', [
    'as' => 'thay-doi-trang-thai',
    'uses' => 'App\Http\Controllers\OrderController@postChangeStatus'
]);

Route::get('ad_orderdetailpage/{id_order}', [
    'as' => 'chi-trang-chi-tiet-order',
    'uses' => 'App\Http\Controllers\OrderController@getOrderDetailView'
]);
//-------------------------------END ORDER----------------------//

//-------------------------------START COMMENT----------------------//
Route::get('ad_commentpage', [
    'as' => 'danh-sach-binh-luan',
    'uses' => 'App\Http\Controllers\CommentController@getCommentList'
]);
Route::post('reply_comment/{id_comment}', [
    'as' => 'tra-loi-binh-luan',
    'uses' => 'App\Http\Controllers\CommentController@postReplyComment'
]);
Route::get('delete-comment', [
    'as' => 'xoa-comment',
    'uses' => 'App\Http\Controllers\CommentController@getDeteleComment'
]);


//-------------------------------END COMMENT----------------------//



// ============================ User page ===========================

Route::get('/', [
    'as' => 'danh-sach-slide-user-page',
    'uses' => 'App\Http\Controllers\PageController@getSlideListUserPage'
]);

Route::get('index', [
    'as' => 'danh-sach-slide-user-page-index',
    'uses' => 'App\Http\Controllers\PageController@getSlideListUserPage'
]);


Route::get('login', function () {
   // session()->flush();
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

Route::get('shop',  [
    'as' => 'shop',
    'uses' => 'App\Http\Controllers\PageController@getShop'
]);

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

//-------------------------------START Checkout----------------------//
Route::post('checkout', [
    'as' => 'cart-checkout-userpage',
    'uses' => 'App\Http\Controllers\CartController@getCheckoutListUserPage'
]);
//-------------------------------END Checkout----------------------//

//-------------------------------START COMMENT----------------------//
Route::post('comment_user', [
    'as' => 'them-comment-user-page',
    'uses' => 'App\Http\Controllers\CommentController@postInsertComment'
]);
//-------------------------------END COMMENT----------------------//

Route::get('contact', function () {
    return view('userpage.user_contact');
});

Route::get('product/{id}', [
    'as' => 'chi-tiet-san-pham-va-binh-luan',
    'uses' => 'App\Http\Controllers\CommentController@getProductDetailAndComment'
]);

Route::post('product/{id}', 'App\Http\Controllers\ProductDetailController@getPrice');



/////////////////////////////USER_CART START/////////////////////
Route::get('cart', 'App\Http\Controllers\CartController@getCart');

Route::post(
    'add2cart',
    [
        'as' => 'them-gio-hang',
        'uses' => 'App\Http\Controllers\CartController@add2Cart',
    ]
);

Route::post(
    'updateCart/{id}',
    [
        'as' => 'sua-gio-hang',
        'uses' => 'App\Http\Controllers\CartController@updateCart',
    ]
);

Route::post(
    'delFromCart/{id}',
    [
        'as' => 'xoa-gio-hang',
        'uses' => 'App\Http\Controllers\CartController@delFromCart',
    ]
);

/////////////////////////////USER_CART END//////////////////////////

/////////////////////////////USER CHECKOUT//////////////////////
Route::get('checkout', 'App\Http\Controllers\CartController@getCheckoutListUserPage');

Route::post(
    'checkVoucher',
    [
        'as' => 'kiem-tra-voucher',
        'uses' => 'App\Http\Controllers\CheckoutController@checkVoucher',
    ]
);

Route::post(
    'order',
    [
        'as' => 'kiem-tra-voucher',
        'uses' => 'App\Http\Controllers\CheckoutController@postOrder',
    ]
);

/////////////////////////////END USER_CHECKOUT//////////////////////
