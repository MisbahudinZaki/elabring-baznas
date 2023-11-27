<?php

namespace App\Http\Controllers;

use App\Models\absen;
use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function hitungDanTampilkan()
    {
        $totalNilai = absen::sum('keterangan_pegawai');

        return view('hitung', ['totalNilai' => $totalNilai]);
    }
}
