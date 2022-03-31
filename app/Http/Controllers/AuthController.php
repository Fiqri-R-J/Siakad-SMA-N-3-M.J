<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('auths.login');
    }
    public function register()
    {
        return view('auths.register');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('admin/beranda');
        }

        return redirect('/login')->with('pesan', 'Email atau Password salah');
    }
    public function postregister(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('admin/dashboard');
        }

        return redirect('/register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
