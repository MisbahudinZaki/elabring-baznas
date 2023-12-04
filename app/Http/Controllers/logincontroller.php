<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data) && Auth::check() && Auth::user()->user_status == 'aktif') {
            return redirect()->route('home');
        }
        elseif(Auth::attempt($data) && Auth::check() && Auth::user()->user_status == 'tidak aktif'){
            return redirect()->route('login')->with('message','maaf, status anda tidak aktif');
        }
        else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect()->route('login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
