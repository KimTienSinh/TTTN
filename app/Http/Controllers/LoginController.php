<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Echo_;

class LoginController extends Controller
{
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
