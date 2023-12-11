<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
       return view('user.index', compact('users'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id'=> 'nullable',
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'status'=>'required',
            'user_status'=>'required',
        ]);

        $data['user_id'] = $this->generateUserId();

        User::create([
            'user_id'=>$data,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'status'=> $request->status,
            'user_status'=> $request->user_status,

        ]);

        return redirect()->route('user.index')->with('success','data disimpan');
    }

    private function generateUserId(){
        return User::count() + 1;
    }

    public function show($id)
    {$user = user::find($id);
        return view('cetak.cetak-pegawai-form', compact('user'));
     }

    public function destroy($id)
    {
        $users=User::find($id);
        $users->delete();

        return redirect()->route('user.index');
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

   public function update(Request $request, $id){
    $this->validate($request, [
        'name'=> 'nullable',
        'tempat_lahir'=> 'nullable',
        'tanggal_lahir' => 'nullable',
        'jenis_kelamin'=> 'nullable',
        'alamat_tingal'=> 'nullable',
        'no_hp'=> 'nullable',

    ]);

    $user=User::find($id);
    $user->update([
        'name'=> $request->name,
        'tempat_lahir'=> $request->tempat_lahir,
        'tanggal_lahir'=> $request->tanggal_lahir,
        'alamat_tinggal'=>$request->alamat_tinggal,
        'jenis_kelamin'=> $request->jenis_kelamin,
        'no_hp'=> $request->no_hp,

    ]);

    return redirect()->route('home');
   }



    public function showchangepasswordform()
    {
        return view('profile.changepassword');
    }

    public function changepassword(Request $request){
        if (!(Hash::check($request->get('current-password'),
        Auth::user()->password))){
            //password sama
            return redirect()->back()->with("error","password yang dimasukkan tidak sama dengan password yang akan diubah. silahkan coba lagi");
        }
        if(strcmp($request->get('current-password'),
        $request->get('new-password'))== 0){
            //password baru dan yang lama sama
            return redirect()->back()->with("error","password yang baru dan yang lama tidak boleh sama. silahkan gunakan password yang lain");
        }
        if(!(strcmp($request->get('new-password'),
        $request->get('new-password-confirmation')))==0){
            //password baru dan konfirmasi berbeda
            return redirect()->back()->with("error","password baru harus sama dengan konfirmasi. silahkan ketik ulang");
        }

        //change password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","password berhasil diubah");
    }
}
