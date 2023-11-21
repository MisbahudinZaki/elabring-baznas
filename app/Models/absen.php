<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;

    protected $table ="absens";
    protected $primaryKey = "id";
    protected $fillable =
    [
        'nama_pegawai',
        'tanggal_pegawai',
        'nama_jabatan',
        'waktu_kehadiran',
        'status',
        'keterangan_pegawai',
        'keterangan_tambahan',
        'waktu_pulang',
        'status_pulang',
    ];

    /*
    public function absen_pulangs(){
        return $this->belongsTo( absen_pulang::class);
    }

    /*protected static function boot()
    {
        parent::boot();



    }*/

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Buat instance dari TabelLain dan simpan
            $tabelLain = new absen_pulang();
            $tabelLain->save();

            // Set ID TabelLain yang baru dibuat pada model TabelUtama
            $model->absen_pulangs_id = $tabelLain->id;
        });

        static::creating(function ($model) {
            // Ambil nilai nomor terakhir dan tambahkan 1
            $lastNumber = self::max('absen_pulangs_id') ?? 0;
            $model->absen_pulangs_id = $lastNumber + 1;

        });
    }*/

}
