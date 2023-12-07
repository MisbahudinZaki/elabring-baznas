<?php

namespace App\Http\Controllers;

use App\Models\absen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PulangController extends Controller
{
    public function index(){
        $absenpulang = absen::all();
        return view('absen.absenpulang.index', compact('absenpulang'));
    }

    public function edit(absen $absenpulang)
    {
        return view('absen.absenpulang.edit', compact('absenpulang'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'waktu_pulang'=> 'nullable',
            'status_pulang'=> 'nullable',
        ]);

        $entryTime = $request->input('waktu_pulang');

        $deadline = Carbon::createFromTime(16, 30, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status_pulang = 'Tepat Waktu';

        } else {

            $status_pulang = 'Pulang Cepat';
        }


        $absenpulang = absen::find($id);
        $absenpulang->update([
            'waktu_pulang' => $entryTime,
            'status_pulang'=>$status_pulang,

        ]);

        return redirect()->route('beranda.index');
    }
}
