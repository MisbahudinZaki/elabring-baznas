<?php

namespace App\Http\Controllers;

use App\Models\absen_pulang;
use Illuminate\Http\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AbsenPulangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $absplngs = absen_pulang::latest()->paginate(10);
            return view('absen_pulang.index',compact("absplngs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("absen_pulang.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "nama_pegawai"=> "required",
            "waktu_pulang"=> "nullable",
            "status"=> "nullable",


        ]);

        $entryTime = $request->input('waktu_pulang');

        $deadline = Carbon::createFromTime(16, 30, 0);

        $entryTimeCarbon = Carbon::createFromTimeString($entryTime);

        if ($entryTimeCarbon > $deadline) {

            $status = 'Tepat Waktu';

        } else {

            $status = 'Pulang Cepat';
        }

        absen_pulang::create([
            "nama_pegawai"=>$request->nama_pegawai,
            "waktu_pulang"=> $entryTime,
            "status" => $status,
        ]);

        return redirect()->route('absen_pulang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absen_pulang $absp)
    {
        return view('absen_pulang.edit',compact('absp'));
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
