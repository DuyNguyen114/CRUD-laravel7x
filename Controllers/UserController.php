<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        @session_start();
    }

    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        if($request->username == '' || $request->password == '' ){
            return redirect('/login')->with('notice', 'Chưa nhập tài khoản hoặc mật khẩu!');
        }     
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            echo "đăng nhập thành công";
        } else{
            return redirect('/login')->with('notice', 'Tài khoản hoặc mật khẩu không đúng!');
        }
    }
}
