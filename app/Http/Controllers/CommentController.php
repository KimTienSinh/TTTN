<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function getCommentList(){
        $list_comment = Comment::all();

        // $data = DB::table('order_details')
        //     ->join('product_details', 'order_details.id_product_detail', '=', 'product_details.id_product_detail',)
        //     ->join('products', 'product_details.id_product', '=', 'products.id_product')
        //     ->where('id_order', '=', $id_order)
        //     ->select('order_details.*', 'products.product_name','product_details.size', 'product_details.color', 'product_details.material')
        //     ->get();

        $data = DB::table('users')
            ->join('comments', 'users.id_user' ,'=', 'comments.id_user')
            ->join('products', 'comments.id_product', '=', 'products.id_product')
            ->select('comments.*', 'users.user_name', 'products.product_name')
            ->get();
        return view('adminpage.ad_commentpage', compact('list_comment','data'));
    }

    public function postReplyComment(Request $req){
        $comment =[
            'id_comment' => $req->id_comment,
            'reply_comment' => $req->reply_comment
        ];
        //dd($req->input());
        Comment::where('id_comment', $req->id_comment)->update($comment);
        return redirect('ad_commentpage');
    }
}
