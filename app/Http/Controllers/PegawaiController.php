<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Alert;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai=pegawai::with('user_id')->all();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'nama_lengkap' => 'required',
        'tanggal_lahir' => 'required',
        'tempat_lahir' => 'required',
        'alamat' => 'required',
        'jabatan' => 'required',
        'wa_number' => 'required',
        ]);

        pegawai::create([
            'nama_lengkap' => $request -> nama_lengkap,
            'tanggal_lahir' => $request -> tanggal_lahir,
            'tempat_lahir' => $request -> tempat_lahir,
            'alamat' => $request ->alamat,
            'jabatan' => $request ->jabatan,
            'wa_number' => $request ->wa_number,
        ]);

        Alert::success('success','data berhasil disimpan');
        return redirect()->route('pegawai.index');
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pegawai=pegawai::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
