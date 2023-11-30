<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
   public function index()
   {
    $users = User::all();
    return view('pegawai.index', compact('users'));
   }

   public function create()
   {
    return view('');
   }
}
