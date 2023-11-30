<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class EditUserController extends Controller
{

    public function index()
    {
        $pengguna = User::all();
        return view("user.status.index", compact("pengguna"));
    }
    public function edit(User $pengguna){
        return view('user.status.edit', compact('pengguna'));
       }

    public function update(Request $request, User $pengguna){
        $this->validate($request, [
            'name'=> 'nullable',
            'status'=>'required',
            'user_status'=>'required',
        ]);

        $pengguna= User::find($pengguna->id);
        $pengguna->update([
            'name'=> $request->name,
            'status'=> $request->status,
            'user_status'=> $request->user_status,
        ]);

        return redirect()->route('user.index');
    }

       public function show($id)
       {
        $pengguna = User::find($id);
        return view('user.status.show', compact('pengguna'));
       }

}
