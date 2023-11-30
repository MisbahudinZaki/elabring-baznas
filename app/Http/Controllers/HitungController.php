<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HitungController extends Controller
{
   // Contoh di dalam controller

   public function tampilkanOpsi()
   {
       // Mengambil nilai unik dari kolom 'nama'
      // $nilaiUnik = User::distinct()->pluck('status');
      $users = User::all();

    $hitung = absen::where("user_id", auth()->user()->id)->where("status",'tepat waktu')->count();

       // Meneruskan nilai unik ke view
       return view('hitung',compact('hitung','users'));
   }

}
