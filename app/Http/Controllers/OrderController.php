<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrderList()
    {
        $list_order = Order::all();
        return view('adminpage.ad_orderpage', compact('list_order'));
    }
    public function getOrderDetailView($id_order)
    {
        $order_view_detail = OrderDetail::where('id_order', $id_order)->get();
        // $data = Country::join('state', 'state.country_id', '=', 'country.country_id')
        //       		->join('city', 'city.state_id', '=', 'state.state_id')
        //       		->get(['country.country_name', 'state.state_name', 'city.city_name']);
        // $data = OrderDetail::join('product_details', 'order_details.id_product_detail', '=', 'product_details.id_product_detail')
        //                  ->join('products', 'products.id_product ', '=', 'product_details.id_product')

        //                 ->get(['products.product_name', 'order_details.id_order', 'order_details.price_sale', 'order_details.quantity']);

        //$data = Product::with('productdetails')->get();
        //$data = Product::with('productdetails')->get();

        $data = DB::table('order_details')
            ->join('product_details', 'order_details.id_product_detail', '=', 'product_details.id_product_detail',)
            ->join('products', 'product_details.id_product', '=', 'products.id_product')
            ->where('id_order', '=', $id_order)
            ->select('order_details.*', 'products.product_name','product_details.size', 'product_details.color', 'product_details.material')
            ->get();

        
        

        $order_info = Order::where('id_order', $id_order)->first();
        return view('adminpage.ad_orderdetailpage', compact('order_view_detail', 'order_info', 'data'));
    }
}
