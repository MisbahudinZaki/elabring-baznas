<?php

namespace App\Http\Controllers;

use App\Models\absen;
use Illuminate\Http\Request;

class cetakcontroller extends Controller
{
    public function cetak()
    {
        $absensi=absen::get();
        return view('cetak.cetak', compact('absensi'));
    }
}
