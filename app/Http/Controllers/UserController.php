<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showchangepasswordform()
    {
        return view('profile.changepassword');
    }

    public function changepassword(Request $request){
        if (!(Hash::check($request->get('current-password'),
        Auth::user()->password))){
            //password sama
            return redirect()->back()->with("error","password yang dimasukkan tidak sama dengan password yang akan diubah. silahkan coba lagi");
        }
        if(strcmp($request->get('current-password'),
        $request->get('new-password'))== 0){
            //password baru dan yang lama sama
            return redirect()->back()->with("error","password yang baru dan yang lama tidak boleh sama. silahkan gunakan password yang lain");
        }
        if(!(strcmp($request->get('new-password'),
        $request->get('new-password-confirmation')))==0){
            //password baru dan konfirmasi berbeda
            return redirect()->back()->with("error","password baru harus sama dengan konfirmasi. silahkan ketik ulang");
        }

        //change password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","password berhasil diubah");
    }
}
