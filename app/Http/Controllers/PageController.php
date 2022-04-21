<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //----------------ADMINPAGE--------------------------------------------
    public function getUserList(){
        $list = User::all();
        return view('adminpage.ad_userpage', compact('list'));
    }
    public function getCategoryList(){
        $list_cat = Category::all();
        return view('adminpage.ad_categorypage', compact('list_cat'));
    }
   
    public function getBlogList(){
        $list_blog = Blog::all();
        return view('adminpage.ad_blogpage', compact('list_blog'));
    }


    //----------------USERPAGE--------------------------------------------
    
    public function getBlogListUserPage(){
        $list_blog = Blog::all();
        $category = Category::all();
        return view('userpage.user_blog', compact('list_blog','category'));
    }
}
