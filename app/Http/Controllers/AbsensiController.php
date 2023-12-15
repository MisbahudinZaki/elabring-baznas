<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\absenpulang;
use App\Models\jabatan;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\User;
//use Illuminate\Console\View\Components\Alert;
use Alert;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi=absen::with('user')->paginate(10);
        return view('absen.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ket=Keterangan::all();
        return view('absen.create', compact('ket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required|date',
            'waktu_kehadiran'=> 'nullable',
            'keterangan_id' => 'required',
            'keterangan_tambahan'=>'nullable',
            'status'=> 'nullable',
            'user_id'=> 'required',
        ]);

        $existData = absen::where('tanggal_pegawai', $request->tanggal_pegawai)->first();

        if($existData){
            Alert :: info('info','data sudah ada');
            return redirect()->back()->with('error','data pada tanggal tersebut sudah ada');
        }

        $entryTime = $request->input('waktu_kehadiran');

        $deadline = Carbon::createFromTime(8, 0, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status = 'Terlambat';

        } else {

            $status = 'Tepat Waktu';
        }

        absen::create([
            'nama_pegawai'=> $request->nama_pegawai,
            'tanggal_pegawai'=> $request->tanggal_pegawai,
            'keterangan_id'=>$request->keterangan_id,
            'keterangan_tambahan'=>$request->keterangan_tambahan,
            'waktu_kehadiran' => $entryTime,
            'status' => $status,
            'user_id'=> $request->user_id,
        ]);

        Alert :: success('success','data berhasil disimpan');
        return redirect()->route('beranda.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $absen = absen::find($id);

        if(!$absen) {
            abort(404);
        }

        return view('absen.show', ['absen' => $absen]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absen $absen)
    {
        $ket=Keterangan::all();
        return view('absen.edit', compact('absen','ket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required',

            'keterangan_pegawai' => 'required',
            'keterangan_tambahan'=>'nullable',
            'waktu_kehadiran'=>'nullable',
            'status_pulang'=> 'nullable',
            'status'=> 'nullable',


        ]);

        $absen=absen::find($id);
        $absen->update([

            'nama_pegawai'=>$request->nama_pegawai,
            'tanggal_pegawai'=>$request->tanggal_pegawai,

            'keterangan_pegawai'=>$request->keterangan_pegawai,
            'keterangan_tambahan'=>$request->keterangan_tambahan,
            'waktu_pulang'=> $request->waktu_ulang,
            'status_pulang'=> $request->status_pulang,
            'status'=> $request->status
        ]);
       // Alert :: success('success','data berhasil diedit');
        return redirect()->route('beranda.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absens=absen::find($id);
        $absens->delete();
        Alert :: success('success','data berhasil dihapus');
        return redirect()->route('beranda.index');
    }

}
