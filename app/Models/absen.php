<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'no_pegawai',
        'nama_pegawai',
        'jabatan_id',
        'tanggal_pegawai',
        'nama_jabatan',
        'alamat',
        'keterangan_pegawai',
        'keterangan_tambahan',
    ];





}
