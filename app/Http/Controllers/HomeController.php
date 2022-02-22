<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function login(){
        if(auth()->check()){
            return redirect()->route('home');
        }
        return view('login');
    }

    public function postLogin(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            if(session()->has('url-redirect')){
                $url = session()->get('url-redirect');
                session()->forget('url-redirect');
                return redirect($url)->with('success', 'Bạn đã đăng nhập thành công');
            }
            return redirect()->route('home')->with('success', 'Bạn đã đăng nhập thành công');
        }
        
        return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công');
    }
}
