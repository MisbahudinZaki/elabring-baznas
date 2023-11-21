<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\absen_pulang;
use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
//use Illuminate\Console\View\Components\Alert;
use Alert;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi=absen::with('absen_pulangs')->paginate(10);
        return view('absen.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('absen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required',
            'nama_jabatan' => 'required',
            'waktu_kehadiran'=> 'required',
            'keterangan_pegawai' => 'required',
            'keterangan_tambahan'=>'nullable',
            'status'=> 'nullable',
            'absen_pulangs_id'=> 'nullable',

        ]);

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
            'nama_jabatan'=>$request->nama_jabatan,
            'keterangan_pegawai'=>$request->keterangan_pegawai,
            'keterangan_tambahan'=>$request->keterangan_tambahan,
            'waktu_kehadiran' => $entryTime,
            'status' => $status,
            'absen_pulangs_id'=> $request->absen_pulangs_id,
        ]);

        Alert :: success('success','data berhasil disimpan');
        return redirect()->route('absen.index');
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
        return view('absen.edit', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required',
            'nama_jabatan'=>'required',

            'keterangan_pegawai' => 'required',
            'keterangan_tambahan'=>'nullable'
        ]);

        $absen=absen::find($id);
        $absen->update([

            'nama_pegawai'=>$request->nama_pegawai,
            'tanggal_pegawai'=>$request->tanggal_pegawai,
            'nama_jabatan'=>$request->nama_jabatan,

            'keterangan_pegawai'=>$request->keterangan_pegawai,
            'keterangan_tambahan'=>$request->keterangan_tambahan
        ]);
       // Alert :: success('success','data berhasil diedit');
        return redirect()->route('absen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $absens=absen::find($id);
        $absens->delete();
        Alert :: success('success','data berhasil dihapus');
        return redirect()->route('absen.index');
    }
}
