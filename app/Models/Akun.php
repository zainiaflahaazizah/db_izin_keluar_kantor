<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Akun extends Authenticatable
{
    protected $table = 'akuns';

    protected $primaryKey = 'id_akun';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'password',
        'role',
        'id_pegawai',
    ];

    protected $hidden = [
        'password',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function izins()
    {
        // Ambil izins melalui pegawai
        return $this->hasManyThrough(
            \App\Models\Izin::class,
            \App\Models\Pegawai::class,
            'id_pegawai', // foreign key di pegawai (local key akun)
            'id_pegawai', // foreign key di izin
            'id_pegawai', // local key akun
            'id_pegawai'  // local key pegawai
        );
    }
}
