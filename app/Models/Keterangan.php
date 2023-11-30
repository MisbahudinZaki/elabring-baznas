<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table ="keterangans";

    protected $primaryKey = "id";
    protected $fillable = [
        "keterangan",
        "keterangan_tambahan",
    ];

    public function absen()
    {
        return $this->hasMany(absen::class);
    }
}
