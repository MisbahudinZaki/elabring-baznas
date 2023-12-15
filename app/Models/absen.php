<?php

namespace App\Models;

use Carbon\Carbon;
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
        'keterangan_id',
        'keterangan_tambahan',
        'waktu_pulang',
        'status_pulang',
        'user_id',
        ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if(static::where('tanggal_pegawai', $model->tanggal_pegawai)->exists()){
                return false;
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function keterangan()
    {
        return $this->belongsTo(Keterangan::class);
    }


    public function absenpulang(){
        return $this->belongsTo(absenpulang::class);
    }

    /*protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Buat instance dari TabelLain dan simpan
            $tabelLain = new absenpulang();
            $tabelLain->save();

            // Set ID TabelLain yang baru dibuat pada model TabelUtama
            $model->absenpulang_id = $tabelLain->id;
        });

        static::creating(function ($model) {
            // Ambil nilai nomor terakhir dan tambahkan 1
            $lastNumber = self::max('absenpulang_id') ?? 0;
            $model->absenpulang_id = $lastNumber + 1;

        });
    }*/

    public function countLateByUserId(){
        return $this->where('status','terlambat')
                    ->groupBy('user_id')
                    ->select('user_id', \DB::raw('count(*) as count'))
                    ->get();
    }

    public function countAbsenPulangKosong()
    {
        return $this->where('absen_pulang', '=', null)->count();
    }

    public function countDaysBetweenDates($tglawal, $tglakhir)
    {
        return $this->whereBetween('tanggal_kehadiran', [$tglawal, $tglakhir])
                    ->get()
                    ->map(function ($item) {
                        return Carbon::parse($item->tanggal_pegawai)->diffInDays(Carbon::parse($item->tanggal_pegawai));
                    })
                    ->sum();
    }

}
