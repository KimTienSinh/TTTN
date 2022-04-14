<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function postRegister(Request $req)
    {
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
        //$u = new User();


        return redirect()->back()->with('register_status', 'Register Success');
        // $user->email = $request->email;
        // $user->password = $request->password;

        // $user->save();
        // return redirect()->route('login')->with('success','dang ky thanh cong');


    }
    public function getLogin()
    {
        return view('userpage.user_login');
    }

    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'passWord' => 'required'
            ],
            [
                'email.required' => 'Please type your email !',
                'email.email' => 'Incorrect email format!',
                'password.required' => 'Please type your password !'
            ]
        );

        $data = [
            'email' => $request->email,
            'password' => $request->passWord,
        ];

        if (Auth::attempt($data)) {
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            return redirect('/index');
        }
        return redirect()->back()->with('login_status', 'Wrong email or password!');
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect('/index');
    }
}
