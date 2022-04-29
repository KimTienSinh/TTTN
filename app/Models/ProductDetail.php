<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = "product_details";
    protected $primaryKey = "id_product_detail";

    protected $fillable = [
        'id_product',
        'size',
        'color',
        'image',
        'price',
        'remaining',
        'voucher_code',
        'status'
    ];

    // 1 ProductDetail có nhiều Comment dùng hasMany( class, 'khoa ngoai', 'khoa chinh')
    public function comment(){
        return $this->hasMany('App\Models\Comment', 'id_product_detail', 'id_product_detail');
    }
    // 1 ProductDetail có nhiều OrderDetail dùng hasMany( class, 'khoa ngoai', 'khoa chinh')
    public function orderdetails(){
        return $this->hasMany('App\Models\OrderDetail', 'id_product','id_product_detail');
    }

}
