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
    ];

    public function absen(){
        return $this->hasMany(absen::class);
    }
}
