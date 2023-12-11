<?php

namespace App\Http\Controllers;
use App\Models\absen;
use App\Models\Absen_Pulang;
use App\Models\Keterangan;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class absenberandacontroller extends Controller
{
    public function index() {
        $user =Auth::user();
        $absensi = absen::with('keterangan','user')->where("user_id", $user->id,)->latest()->get();
        $ket = Keterangan::all();
        //$absensi=absen::with('absen_pulangs','users')->paginate(10);
        return view("beranda.index", compact("absensi","ket"));
    }
}
