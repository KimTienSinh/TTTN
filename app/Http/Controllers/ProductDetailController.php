<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function getPrice(Request $request, $id)
    {
        $product = ProductDetail::where([
            'id_product' => $id,
            'color' => $request->color,
            'size' => $request->size
        ])->first();
        $data = $product->price;
        return response(number_format($data));
    }
}
