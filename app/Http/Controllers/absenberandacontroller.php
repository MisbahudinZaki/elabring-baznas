<?php

namespace App\Http\Controllers;
use App\Models\absen;
use App\Models\Absen_Pulang;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class absenberandacontroller extends Controller
{
    public function index() {
        $user =Auth::user();
        $absensi = Absen::with('absen_pulangs','keterangan')->where("user_id", $user->id)->latest()->get();
        //$absensi=absen::with('absen_pulangs','users')->paginate(10);
        return view("beranda.index", compact("absensi"));
    }
}
