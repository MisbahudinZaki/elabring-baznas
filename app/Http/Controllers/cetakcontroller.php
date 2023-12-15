<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\Absen_Pulang;
use App\Models\absenpulang;
use App\Models\Keterangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Queue\WorkerOptions;
use Illuminate\Validation\Rules\Unique;

class cetakcontroller extends Controller
{
    public function cetak()
    {
        $absensi=absen::get();
        $absplng=absenpulang::get();
        return view("cetak.cetak",compact("absensi","absplng"));
    }

    public function cetakform(){
        $ket = Keterangan::all();
        $absensi=absen::latest()->get();
        return view('cetak.cetak-pegawai-form', compact('absensi','ket'));
    }

    public function show($id)
    {
        $user = user::find($id);
        return view('cetak.cetak-pegawai-form', compact('user'));
    }

    public function cetakpegawaipertanggal($tglawal, $tglakhir ){
       // dd(["Tanggal Awal".$tglawal, "Tanggal Akhir :".$tglakhir])

       $users = User::all();
       $hari = absen::whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->get()
       ->map(function ($item){
        return Carbon::parse($item->tanggal_pegawai)->format('Y-m-d');
       })->Unique()->count();


       $hadir = absen::where('keterangan_id','1')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as hadir_count'))->get();
       $telat = absen::where('status','terlambat')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(status), 0) as late_count'))->get();
       $cuti = absen::where('keterangan_id','3')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as cuti_count'))->get();
       $sakit = absen::where('keterangan_id','2')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as sick_count'))->get();
       $dinas = Absen::where('keterangan_id','4')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as dinas_count'))->get();
       $rapat = absen::where('keterangan_id','5')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as rapat_count'))->get();
       $train = Absen::where('keterangan_id','6')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(keterangan_id), 0) as train_count'))->get();
       $pulangcepat = absen::where('status_pulang','pulang_cepat')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(status_pulang), 0) as pc_count'))->get();
       $tdkabspulang = absen::whereNull('waktu_pulang')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->groupBy('user_id')->select('user_id', \DB::raw('COUNT(*) as tdkabsplng_count'))->get();

       $absensi=absen::with('absenpulang')->whereBetween('tanggal_pegawai',[$tglawal, $tglakhir])->latest()->get();
       return view('cetak.cetakpegawaipertanggal', compact('absensi','hari','telat','users','sakit','cuti','dinas','rapat','train','hadir','pulangcepat','tdkabspulang'));
    }

    public function showCountAbsenPulangKosong()
    {
        $countAPK = absen::countAbsenPulangKosong();

        return view('cetak.cetakpegawaipertanggal', compact('countAPK'));
    }
}
