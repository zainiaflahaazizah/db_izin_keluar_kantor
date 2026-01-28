<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $primaryKey = 'id_izin';


    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_pegawai',
        'alasan',
        'jam_keluar',
        'jam_kembali',
        'keterangan',
        'tujuan_persetujuan',
        'status',

    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function dokumentasi()
    {
        return $this->hasOne(Dokumentasi::class, 'id_izin');
    }

}
