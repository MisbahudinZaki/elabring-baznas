<?php

namespace App\Http\Controllers;
use App\Models\absen;
use App\Models\absenpulang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsenpulangController extends Controller
{
    public function index(){
        $absenpulang = absenpulang::latest()->paginate(10);
        return view("absenpulang.index",compact("absenpulang"));
    }

    public function create(){
        return view('absenpulang.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'waktu_pulang'=> 'nullable',

            'status_pulang'=> 'nullable',
            'user_id'=>'nullable'
            ]);

            $entryTime = $request->input('waktu_pulang');

        $deadline = Carbon::createFromTime(16, 30, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status_pulang = 'Tepat Waktu';

        } else {

            $status_pulang = 'Pulang Cepat';
        }

        absenpulang::create([
            'waktu_pulang'=> $entryTime,
            'status_pulang'=> $status_pulang,
            'user_id'->$request->user_id
        ]);
    }

    public function show($id){
        $absen = absenpulang::find($id);
        return view('absenpulang.show', compact('absen'));
    }

    public function edit(absenpulang $absenpulang){
        return view('absenpulang.edit', compact('absenpulang'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'waktu_pulang'=> 'nullable',
            'status_pulang'=> 'nullable',
            'user_id'=>'nullable'
        ]);

        $entryTime = $request->input('waktu_pulang');

        $deadline = Carbon::createFromTime(16, 30, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status_pulang = 'Tepat Waktu';

        } else {

            $status_pulang = 'Pulang Cepat';
        }

        $absenpulang = absenpulang::find($id);
        $absenpulang->update([
            'waktu_pulang'=> $entryTime,
            'status_pulang'=> $status_pulang,
            'user_id'=>$request->user_id
        ]);

        return redirect()->route('beranda.index');
    }
}
