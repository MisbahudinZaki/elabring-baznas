<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen_pulang extends Model
{
    use HasFactory;

    protected $table = "absen_pulangs";

    protected $primaryKey = "id";
    protected $fillable = [
        'nama_pegawai',
        'tanggal_pegawai',
        'waktu_pulang',
        'keterangan_pegawai',
        'status',
    ];

    public function absen(){
        return $this->hasMany(absen::class);
    }
}
