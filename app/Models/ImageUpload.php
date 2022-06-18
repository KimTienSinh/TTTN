<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class ImageUpload extends Model
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function imageUploadPost($image)
    {
        // Validator::make($image, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $imageName = time().Hash::make(time()) . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return $imageName;
    }
}
