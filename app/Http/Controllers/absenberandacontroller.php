<?php

namespace App\Http\Controllers;
use App\Models\absen;
use App\Models\Absen_Pulang;

use Illuminate\Http\Request;

class absenberandacontroller extends Controller
{
    public function index() {
        $absensi = absen::latest()->paginate(10);
        $absplngs = Absen_Pulang::latest()->paginate(10);
        return view("beranda.index", compact("absensi","absplngs"));
    }
}
