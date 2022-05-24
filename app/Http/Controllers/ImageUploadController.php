<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost($image)
    {
        // Validator::make($image, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $imageName = time() . '.' . $image->extension();

        $image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return $imageName;
    }
}
