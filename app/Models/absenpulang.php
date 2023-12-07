<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absenpulang extends Model
{
    use HasFactory;

    protected $table = "absenpulangs";

    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        'waktu_pulang',
        'status_pulang',
        'user_id',
        'tanggal_pegawai'
    ];

    public function absen(){
        return $this->hasMany(absen::class);
    }

    public function absensi()
    {
        return $this->belongsTo(absen::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
