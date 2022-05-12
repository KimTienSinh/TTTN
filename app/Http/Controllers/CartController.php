<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getCheckoutListUserPage(Request $req){

        // $data = DB::table('order_details')
        //     ->join('product_details', 'order_details.id_product_detail', '=', 'product_details.id_product_detail',)
        //     ->join('products', 'product_details.id_product', '=', 'products.id_product')
        //     ->where('id_order', '=', $id_order)
        //     ->select('order_details.*', 'products.product_name','product_details.size', 'product_details.color', 'product_details.material')
        //     ->get();

        $list_checkout_cart = Cart::where('id_user', $req->id_user)->get();
        // $id_user = Auth::user()->id_user;
        //->join('cart', 'users.id_user', '=', 'cart.id_user')

        $data = DB::table('cart')
            ->join('product_details', 'cart.id_product_detail', '=', 'product_details.id_product_detail')
            ->join('products', 'product_details.id_product', '=', 'products.id_product')
            ->where('id_user', '=', $req->id_user)
            ->select('products.product_name', 'cart.quantity', 'product_details.price')
            ->get();
        return view('userpage.user_checkout', compact('data'));

    }
}
