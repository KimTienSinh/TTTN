<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\ImageUpload;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function insertProduct(Request $request)
    {
        // if ($request->img[0]) {
        //     $image = new ImageUploadController();
        //     $img = $image->imageUploadPost($request->img[0]);
        // }
        $request->validate(ProductDetail::getRule());
        $product = [
            'id_category' => $request->category,
            'product_name' => $request->name,
            'description' => $request->descrip,
            'id_manufacturer' => $request->id_manufacturer,
            'material' => $request->material,
            //  'image' => $img,
            'status' => 1,
        ];
        $prd_id = Product::insertGetId($product);
        foreach ($request->image as $image) {
            $imageName = ImageUpload::imageUploadPost($image);
            $imageProduct = [
                'id_product' => $prd_id,
                'image' => $imageName
            ];
            ImageProduct::insert($imageProduct);
        }

        foreach ($request->color as  $color) {
            foreach ($request->size as $size) {
                $color_key = array_search($color, $request->color);
                $size_key = array_search($size, $request->size);
                $key = $color_key . $size_key;
                $img =  $request->img[$color_key];
                $imageName = ImageUpload::imageUploadPost($img);
                $productDetail = [
                    'id_product' => $prd_id,
                    'size' => $size,
                    'color' => $color,
                    'image' => $imageName,
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

    public function editProduct(Request $request, $id)
    {
        //$color_key là id_product_detail
        // if ($request->img[0]) {
        //     $img = ImageUpload::imageUploadPost($request->img[0]);
        // }
        $img = 'none';
        // if ($request->img[0]) {
        //     $image = new ImageUploadController();
        //     $img = $image->imageUploadPost($request->img[0]);
        // }

        $product = [
            'id_category' => $request->category,
            'product_name' => $request->name,
            'description' => $request->descrip,
            'id_manufacturer' => $request->id_manufacturer,
            'material' => $request->material,
            //  'image' => $img,
            'status' => 1,
        ];

        Product::find($id)->update($product);

        if ($request->image) {
            foreach ($request->image as $index => $image) {
                $imageName = ImageUpload::imageUploadPost($image);
                $imgProduct = ImageProduct::firstOrNew([
                    'id_image_product' => $index,
                    'id_product' => $id,
                ]);
                $imgProduct->image = $imageName;
                $imgProduct->save();
            }
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

                // if ($request->img[0]) {
                //     $product_detail->image = $img;
                //     $prd = Product::find($request->id);
                //     $prd->image = $img;
                //     $prd->save();
                // }
                if ($request->img) {
                    $id_color_key = (string)$color_key;
                    if (isset($request->img[$id_color_key])) {
                        $imageName = ImageUpload::imageUploadPost($request->img[$id_color_key]);
                        $product_detail->image = $imageName;
                    }
                } else {
                    if (!$product_detail->image) {
                        $product_detail_image = ProductDetail::find([
                            'id_product' => $request->id,
                            'color' => $color
                        ])->first();
                        if ($product_detail_image) {
                            $product_detail->image = $product_detail_image->image;
                        } else {
                            $product_detail->image = "clothes-default.png";
                        }
                    }
                }
                $product_detail->price = $request->price[$key];
                $product_detail->remaining = $request->remaining[$key];
                $product_detail->status = '1';

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
