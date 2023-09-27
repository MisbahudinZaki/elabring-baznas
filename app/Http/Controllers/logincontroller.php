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

        if (Auth::Attempt($data) && Auth::check() && Auth::user()->status == 'admin') {
            return redirect()->route('home');
        }
        elseif(Auth::attempt($data) && Auth::check() && Auth::user()->status == 'pegawai'){
            return redirect()->route('absen.index');
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
