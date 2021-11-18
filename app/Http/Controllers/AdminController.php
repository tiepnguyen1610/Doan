<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Hiển thị Login Form
    public function login()
    {
    	return view('backend.login');
    }

    //Kiểm tra điều kiện đăng nhập trang Admin
    public function postlogin(Request $request)
    {
    	$remember = $request->has('remember') ? true : false;
    	if(auth()->attempt([
    		'email' => $request->email,
    		'password' => $request->password
    	], $remember)){
    		return redirect()->route('statistics.dashboard');
    	}else{
            return redirect()->route('form_login')
                ->with([
                    'level' => 'danger',
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác'
                ]);
        }
    }

    //Đăng Xuất khỏi trang Admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('form_login');
    }
}
