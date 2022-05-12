<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insertProduct(Request $request)
    {
        $product = [
            'id_categories' => $request->category,
            'product_name' => $request->name,
            'description' => $request->descrip,
            'image' => 'none',
            'status' => 1
        ];
        $prd_id = Product::insertGetId($product);
        //    dd($request->all());

        foreach ($request->color as  $color) {
            foreach ($request->size as $size) {
                $color_key = array_search($color, $request->color);
                $size_key = array_search($size, $request->size);
                $key = $color_key . $size_key;
                $productDetail = [
                    'id_product' => $prd_id,
                    'size' => $size,
                    'color' => $color,
                    'image' => 'none',
                    'price' => $request->price[$key],
                    'remaining' => $request->remaining[$key],
                    'status' => '1',
                    'voucher_code' => 'none',
                ];
                ProductDetail::insert($productDetail);
            }
        }
        return redirect('ad_Product');
    }

    public function getProductEditPage()
    {
    }

    public function editProduct(Request $request)
    {
        //$color_key là id_product_detail
        foreach ($request->color as  $color) {
            foreach ($request->size as $size) {
                $color_key = array_search($color, $request->color);
                $size_key = array_search($size, $request->size);
                $key = $color_key . $size_key;
                $product_detail = ProductDetail::firstOrNew([
                    'id_product' => $request->id,
                    'size' => $size,
                    'color' => $color
                ]);


                $product_detail->image = 'none';
                $product_detail->price = $request->price[$key];
                $product_detail->remaining = $request->remaining[$key];
                $product_detail->status = '1';
                $product_detail->voucher_code = 'none';


                $product_detail->save();
            }
        }
        return redirect('ad_Product');
    }
    public function deletedProduct(Request $request)
    {
        Product::find($request->id_product)->update(['status' => '0']);
        return redirect('ad_Product');
    }
}
