<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class officeprofileController extends Controller
{
    public function index()
    {
        return view('profile.about');
    }
}
