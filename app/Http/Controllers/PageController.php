<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getUserList(){
        $list = User::all();
        return view('adminpage.ad_userpage', compact('list'));
    }

    

}
