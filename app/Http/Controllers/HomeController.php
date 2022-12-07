<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function about()
    {
        return view('about');
    }
    public function login()
    {   
        // dd(bcrypt(123456));
        return view('home.login');

    }
    public function check_login(Request $req)
    {
       $data = $req->only('email','password');
       $check_login = auth('cus')->attempt($data,$req->has('remember'));
    //    dd($check_login);
    if($check_login)
    {
    return redirect()->route('home.index')->with('success','Chào mừng bạn đã quay trở lại' );

    }
    return redirect()->back()->with('error','Login failed');
}
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('home.login')->with('success','Thoát thành công');
    }
    public function register()
    {
        return view ('home.register');
    }
    public function account()
    {
        $auth = auth('cus')->user();
        return view('home.account',);
    }
    public function productdetail()
    {
        return view('productdetail');
    }
}


