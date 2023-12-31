<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'jabatan_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_tinggal',
        'no_hp',
        'status',
        'user_status',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

    public function isAktif(){
        return $this->user_status === 'aktif';
    }

    public function isAdmin()
{
    return $this->status === 'admin'; // Gantilah dengan logika sesuai dengan penggunaan Anda.
}

public function absens()
{
    return $this->hasMany(absen::class);
}

public function absen_pulangs()
{
    return $this->hasMany(absenpulang::class);
}

}

