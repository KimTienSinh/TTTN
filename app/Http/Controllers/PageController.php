<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
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

    public function getVoucherList(){
        $list_voucher = Voucher::all();
        return view('adminpage.ad_voucherpage', compact('list_voucher'));
    }

    public function getSlideList(){
        $list_slide = Slide::all();
        return view('adminpage.ad_slidepage', compact('list_slide'));
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

    
}
