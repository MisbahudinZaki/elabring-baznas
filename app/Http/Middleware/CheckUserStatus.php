<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status === 'admin') {
            // Redirect atau lakukan tindakan lain jika status tidak aktif.
            return redirect()->route('home');
        }
        else(Auth::check() && Auth::user()->status === 'pegawai'){
            return redirect()->route('absen.index');
        }

        return $next($request);
    }
}
