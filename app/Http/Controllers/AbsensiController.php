<?php

namespace App\Http\Controllers;

use App\Models\absen;
use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Console\View\Components\Alert;
use Alert;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi=absen::latest()->paginate(10);
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
            'no_pegawai' => 'required',
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required',
            'nama_jabatan' => 'required',
            'alamat'=> 'required',
            'keterangan_pegawai' => 'required',
            'keterangan_tambahan'=>'nullable',
            'created_at' => 'nullable'
        ]);

        absen::create([
            'no_pegawai'=>$request->no_pegawai,
            'nama_pegawai'=>$request->nama_pegawai,
            'tanggal_pegawai'=>$request->tanggal_pegawai,
            'nama_jabatan'=>$request->nama_jabatan,
            'alamat'=>$request->alamat,
            'keterangan_pegawai'=>$request->keterangan_pegawai,
            'keterangan_tambahan'=>$request->keterangan_tambahan,
            'created_at'=>$request->created_at
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
            'no_pegawai' => 'required',
            'nama_pegawai' =>'required',
            'tanggal_pegawai'=>'required',
            'nama_jabatan'=>'required',
            'alamat'=>'required',
            'keterangan_pegawai' => 'required',
            'keterangan_tambahan'=>'nullable'
        ]);

        $absen=absen::find($id);
        $absen->update([
            'no_pegawai'=>$request->no_pegawai,
            'nama_pegawai'=>$request->nama_pegawai,
            'tanggal_pegawai'=>$request->tanggal_pegawai,
            'nama_jabatan'=>$request->nama_jabatan,
            'alamat'=>$request->alamat,
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
