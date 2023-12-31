<?php

namespace App\Http\Controllers;

use App\Models\Keterangan;
use Illuminate\Http\Request;

class keterangancontroller extends Controller
{
    public function index(){
        $keterangan = Keterangan::all();
        return view("keterangan.index",compact("keterangan"));
    }

    public function create(){
        return view('keterangan.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'keterangan'=> 'required',
            'keterangan_tambahan'=> 'nullable',
        ]);

        Keterangan::create([
            'keterangan'=>$request->keterangan,
            'keterangan_tambahan'=>$request->keterangan_tambahan
        ]);

        return redirect()->route('keterangan.index');
    }

    public function edit(Keterangan $keterangan)
    {
        return view('keterangan.edit', compact('keterangan'));
    }

    public function update(Request $request,Keterangan $ket, $id)
    {
        $this->validate($request,[
            'keterangan'=> 'required',
        ]);

        $keterangan= Keterangan::find($id);
        $keterangan->update([
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('keterangan.index');

    }
}
