<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $fillable =[
        'nama_lengkap',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'jabatan',
        'wa_number',
    ];
}
