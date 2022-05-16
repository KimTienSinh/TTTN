<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Slide;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //----------------ADMINPAGE--------------------------------------------
    public function getUserList()
    {
        $list = User::all();
        return view('adminpage.ad_userpage', compact('list'));
    }
    public function getCategoryList()
    {
        $list_cat = Category::all();
        return view('adminpage.ad_categorypage', compact('list_cat'));
    }

    public function getBlogList()
    {
        $list_blog = Blog::all();
        return view('adminpage.ad_blogpage', compact('list_blog'));
    }

    public function getVoucherList()
    {
        $list_voucher = Voucher::all();
        return view('adminpage.ad_voucherpage', compact('list_voucher'));
    }

    public function getSlideList()
    {
        $list_slide = Slide::all();
        return view('adminpage.ad_slidepage', compact('list_slide'));
    }

    public function getCommentList()
    {
        $list_comment = Comment::all();
        return view('adminpage.ad_commentpage', compact('list_comment'));
    }

    public function ad_getAllProduct()
    {
        $product_list = Product::all();
        //dd($product_list);
        return view('adminpage.ad_productpage', compact('product_list'));
    }

    public function getProductEditPage(Request $request)
    {
        $list_dropdown = Category::where(['type' => 0])->get();
        if ($request->isMethod('post')) {
            $product = Product::find($request->id_product);
            $product_detail = Product::find($request->id_product)->product_detail;
            return view('adminpage.ad_producteditpage', compact('list_dropdown', 'product', 'product_detail'));
        }
        return view('adminpage.ad_producteditpage', compact('list_dropdown'));
    }

    //----------------USERPAGE--------------------------------------------

    public function getBlogListUserPage()
    {
        $list_blog = Blog::all();
        $category = Category::all();
        return view('userpage.user_blog', compact('list_blog', 'category'));
    }

    public function getSlideListUserPage()
    {
        $list_slide = Slide::all();
        return view('userpage.user_home', compact('list_slide'));
    }

    public function getShop()
    {
        $list_product = Product::all();
        return view('userpage.user_shop', compact('list_product'));
    }

    public function getProductDetail($id)
    {
        $product = Product::find($id);
        $product_detail = Product::find($id)->product_detail;
        $color_size_price = []; //Tạo ra mảng 3 chiều với các tham số $varName[color][size][price]=remaing;
        foreach ($product_detail as $detail) {
            $color_size_price[$detail->color][$detail->size][$detail->price] = $detail->remaining;
        }
        $arr = array("Ford", "BMW", "Audi", "Fiat");
        $data = json_encode($arr);
        return view('userpage.user_product', compact('product', 'color_size_price', 'data'));
    }
}
