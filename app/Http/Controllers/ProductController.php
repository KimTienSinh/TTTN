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
}
