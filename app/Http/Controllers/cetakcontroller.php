<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\Absen_Pulang;
use App\Models\absenpulang;
use Illuminate\Http\Request;
use Illuminate\Queue\WorkerOptions;

class cetakcontroller extends Controller
{
    public function cetak()
    {
        $absensi=absen::get();
        $absplng=absenpulang::get();
        return view("cetak.cetak",compact("absensi","absplng"));
    }

    public function cetakform(){
        $absensi=absen::with('absen_pulangs')->latest()->get();
        return view('cetak.cetak-pegawai-form', compact('absensi'));
    }

    public function cetakpegawaipertanggal($tglawal, $tglakhir ){
       // dd(["Tanggal Awal".$tglawal, "Tanggal Akhir :".$tglakhir]);

       $absensi=absen::with('absen_pulangs')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->latest()->get();
       return view('cetak.cetakpegawaipertanggal', compact('absensi'));
    }
}
