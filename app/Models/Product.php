<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id_product";

    protected $fillable = [
        'id_categories',
        'product_name',
        'description',
        'image',
        'status'
    ];
    // 1 Product có nhiều ProductDetail dùng hasMany( class, 'khoa ngoai', 'khoa chinh')
    public function productdetails(){
        return $this->hasMany('App\Models\ProductDetail', 'id_product');
    }
}
