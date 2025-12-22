<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pegawai';


    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'nip',
        'nip_bps',
        'jabatan',
        'wilayah',
        'status',
        'pendidikan',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'id_user',
    ];

     public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function izins()
    {
        return $this->hasMany(Izin::class, 'id_pegawai', 'id_pegawai');
    }
}
