<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\absenpulang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class HitungController extends Controller
{

    public function index()
    {
       $users = User::all();
       $absen = Absen::all();
       $telat = absen::where('status','terlambat')->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(*), 0) as late_count'))->get();
       $sakit = absen::where('keterangan_id','2')->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(*), 0) as sick_count'))->get();
       $pulangcepat = absenpulang::where('status_pulang','pulang cepat')->count();
       $cuti = absen::where('keterangan_id','3')->groupBy('user_id')->select('user_id', \DB::raw('COALESCE(COUNT(*), 0) as cuti_count'))->get();
       $dinas = Absen::where('keterangan_id','4')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as dinas_count'))->get();
       $rapat = absen::where('keterangan_id','5')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as rapat_count'))->get();
       $train = Absen::where('keterangan_id','6')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as $train_count'))->get();
       return view("hitung", compact("users",'absen',"telat","sakit","pulangcepat",'cuti','dinas','rapat','train'));

    }

    /*public function tampilkanOpsi()
    {
        $absens = absen::withCount(['user as id_1' => function(Builder $query){
            $query->where( column:'id', operator:'1');
        },'user' => function(Builder $query){
            $query->where( column:'id', operator:'2');
        }
         ])->get();
        return view('hitung', compact(var_name:'absens'));
    }*/

    public function terlambat()
    {
        $terlambat = absen::with('user')->where('status','terlambat')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as late_count'))->get();
        $sakit = absen::where('keterangan_id','2')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as sick_count'))->get();
        return view('opsi', compact('terlambat','sakit'));
    }

    public function showLateStatusCountsByUserId(){


    }



}
