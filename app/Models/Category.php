<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $primaryKey = "id_categories";

    protected $fillable = [
        'id_parent',
        'category_name',
        'type',
        'status'
    ];


    /// khi insert vô db với hàm save() thì migration nó báo lỗi với created_at, thêm dòng sau để tắt nó đi
    public $timestamps = false;

    // 1 Category có nhiều blog dùng hasMany( class, 'khoa ngoai', 'khoa chinh')
    public function blogs(){
        return $this->hasMany('App\Models\Blog', 'id_categories', 'id_categories');
    }
}
