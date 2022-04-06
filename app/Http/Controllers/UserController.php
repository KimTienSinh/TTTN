<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function postRegister(Request $req){
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Please type your email !',
                'address.required' => 'Please type your address !',
                'phone.required' => 'Please type your phone number !',
                'email.email' => 'Incorrect email format !',
                'email.unique' => 'Email already in use !',
                'password.required' => 'Please type your password !',
                're_password.same' => 'Re Password not match !'
            ]
        );

        DB::table('users')->insert(
            [
                'user_name' =>  $req->name,
                'address' =>  $req->address,
                'phone' =>  $req->phone,
                'email' =>  $req->email,
                'password' =>  Hash::make($req->password),
                'avatar' =>  'UNDONE',
                'gender' => $req->rd_gioitinh,
                'role' =>  'user',
                'status' => 1
            ]
        );

        return redirect()->back()->with('register_status', 'Register Success');
        // $user->email = $request->email;
        // $user->password = $request->password;

        // $user->save();
        // return redirect()->route('login')->with('success','dang ky thanh cong');
    }
}
