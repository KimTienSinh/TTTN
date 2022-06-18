<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ImageUpload;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insertProduct(Request $request)
    {
        $img = 'none';
        // if ($request->img[0]) {
        //     $image = new ImageUploadController();
        //     $img = $image->imageUploadPost($request->img[0]);
        // }
            
        $product = [
            'id_category' => $request->category,
            'product_name' => $request->name,
            'description' => $request->descrip,
          //  'image' => $img,
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
                    'image' => $img,
                    'price' => $request->price[$key],
                    'remaining' => $request->remaining[$key],
                    'status' => '1',
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
        if ($request->img[0]) {
            $img = ImageUpload::imageUploadPost($request->img[0]);
        }
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

                if ($request->img[0]) {
                    $product_detail->image = $img;
                    $prd = Product::find($request->id);
                    $prd->image = $img;
                    $prd->save();
                }
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
